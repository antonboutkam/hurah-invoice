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
        $twig = new \Twig\Environment($loader);

        return new Html($twig->render('invoice.twig', ['invoice' => $this->invoiceStructure->getInvoice()]));
	}


}
