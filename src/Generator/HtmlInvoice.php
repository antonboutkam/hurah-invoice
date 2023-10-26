<?php
namespace Hurah\Invoice\Generator;

use Hurah\Invoice\StructureInterface;
use Hurah\Types\Type\Html;

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



	public function render(): Html
	{
        $loader = new \Twig\Loader\ArrayLoader([
            'invoice.twig' => $this->twigTemplate,
        ]);

        $config = $this->invoiceStructure->getEnvironment()->getTwigConfig();

        $twig = new \Twig\Environment($loader, $config);

		if(isset($config['debug']) && $config['debug'])
		{
			$twig->addExtension(new \Twig\Extension\DebugExtension());
		}


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
				'customer' => $invoice->getOurNote()
			]
		];



        return new Html($twig->render('invoice.twig', $aVars));
	}


}
