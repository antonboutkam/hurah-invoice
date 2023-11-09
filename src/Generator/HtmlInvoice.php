<?php

namespace Hurah\Invoice\Generator;

use Hurah\Invoice\StructureInterface;
use Hurah\Types\Exception\NullPointerException;
use Hurah\Types\Type\Html;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\DebugExtension;
use Twig\Loader\ArrayLoader;
use Twig\TwigFilter;

final class HtmlInvoice
{
	private StructureInterface $invoiceStructure;
	private string $twigTemplate;

	/**
	 * HtmlInvoice::__construct()
	 */
	public function __construct(StructureInterface $invoiceStructure, string $twigTemplate)
	{
		$this->invoiceStructure = $invoiceStructure;
		$this->twigTemplate = $twigTemplate;
	}

	/**
	 * @throws SyntaxError
	 * @throws RuntimeError
	 * @throws LoaderError
	 */
	public function render(): Html
	{
		$loader = new ArrayLoader([
			'invoice.twig' => $this->twigTemplate,
		]);

		$config = $this->invoiceStructure->getEnvironment()->getTwigConfig();
		$twig = new Environment($loader, $config);


		if (isset($config['debug']) && $config['debug']) {
			$twig->addExtension(new DebugExtension());
		}
		$environment = $this->invoiceStructure->getEnvironment();
		self::addTranslateFilter($twig, $environment);

		$invoice = $this->invoiceStructure->getInvoice();
		$ownCompany = $invoice->getOwnCompany();
		$customer = $invoice->getCustomer();
		$order = $invoice->getOrder();
		$aVars = [
			'structure' => $this->invoiceStructure,
			'invoice' => $invoice,
			'company' => $ownCompany,
			'customer' => $customer,
			'order' => $order,
			'number' => $invoice->getNumber(),
			'notes' => [
				'own' => $invoice->getCustomerNote(),
				'customer' => $invoice->getOurNote(),
			],
		];
		return new Html($twig->render('invoice.twig', $aVars));
	}

	private static function addTranslateFilter(Environment $twig, \Hurah\Invoice\Data\Invoice\Environment $environment): void
	{

		$filter = new TwigFilter('translate', function ($twigEnv, $context, $string) use ($environment) {

			$translations = $environment->getTranslations();
			if (isset($translations[$string])) {
				return $translations[$string];
			}
			elseif ($environment->debuggingEnabled()) {
				throw new NullPointerException("No translation was found for: {$string}  in (" . json_encode($translations) . ");");
			}

			return $string;
		}, [
			'needs_context' => true,
			'needs_environment' => true,
			'is_safe' => ['all'],
		]);
		$twig->addFilter($filter);
	}

}
