<?php
namespace Hurah\Invoice;

use Hurah\Invoice\Generator\Document\InvoiceDocumentTypeInterface as Type;
use Hurah\Invoice\Generator\HtmlInvoice;
use Hurah\Invoice\Generator\Result\ResultHandlerInterface as ResultHandler;

final class InvoiceBuilder
{
	private StructureInterface $invoiceStructure;
	private string $twigTemplate;
	private Type $invoiceType;
	private ResultHandler $handler;


	public function __construct()
	{
	}


	/**
	 * Invoice::create()

	 */
	public static function create(
		StructureInterface $invoiceStructure,
		string $twigTemplate,
		Type $invoiceType,
		ResultHandler $handler
	): self {
		$new = new self();
		$new->invoiceStructure = $invoiceStructure;
		$new->twigTemplate = $twigTemplate;
		$new->invoiceType = $invoiceType;
		$new->handler = $handler;
		return $new;
	}


	public static function init(StructureInterface $invoiceStructure):self
	{
		$new = new self();
		$new->setInvoiceStructure($invoiceStructure);
        return $new;
	}


	/**
	 * InvoiceBuilder::setInvoiceStructure()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param StructureInterface $invoiceStructure
	 * @return self
	 */
	final public function setInvoiceStructure(StructureInterface $invoiceStructure): self
	{
		$this->invoiceStructure = $invoiceStructure;
		return $this;
	}


	public function makeInvoice(): string
	{
		$oHtmlInvoice = new HtmlInvoice($this->invoiceStructure, $this->twigTemplate);
		$oHtml = $oHtmlInvoice->render();
		$oMixedInvoice = $this->invoiceType->convert($oHtml);
		return $this->handler->handle();
	}


	/**
	 * InvoiceBuilder::setTwigTemplate()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $twigTemplate
	 * @return self
	 */
	final public function setTwigTemplate(string $twigTemplate): self
	{
		$this->twigTemplate = $twigTemplate;
		return $this;
	}


	/**
	 * InvoiceBuilder::setInvoiceType()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param Type $invoiceType
	 * @return self
	 */
	final public function setInvoiceType(Type $invoiceType): self
	{
		$this->invoiceType = $invoiceType;
		return $this;
	}


	/**
	 * InvoiceBuilder::setHandler()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param ResultHandler $handler
	 * @return self
	 */
	final public function setHandler(ResultHandler $handler): self
	{
		$this->handler = $handler;
		return $this;
	}
}
