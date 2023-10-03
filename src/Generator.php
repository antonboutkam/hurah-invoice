<?php
namespace Hurah\Invoice;

use Hurah\Invoice\Data\Invoice;

final class Generator
{
	private Invoice $invoice;


	/**
	 * Generator::__construct()
	 */
	public function __construct()
	{
		$this->invoice = new Invoice();
	}


	/**
	 * Generator::create()
	 * @generate [properties, getters, setters, addders, createFromArray, toArray]
	 */
	public static function create(Invoice $invoice): self
	{
		$new = new self();
		$new->invoice = $invoice;
		return $new;
	}


	/**
	 * Generator::createFromArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param array $array
	 * @return self
	 */
	final private static function createFromArray(array $array): self
	{
		$new = new self();
		$oInvoice = Invoice::createFromArray($array['invoice']);
		$new->setInvoice($oInvoice);
		return $new;
	}


	/**
	 * Generator::toArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return array
	 */
	final public function toArray(): array
	{
		return [
		'invoice' => $this->getInvoice(),
		];
	}


	/**
	 * Generator::getInvoice()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 */
	final public function getInvoice(): Invoice
	{
		return $this->invoice;
	}


	/**
	 * Generator::setInvoice()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param \Hurah\Invoice\Data\Invoice $invoice
	 */
	final public function setInvoice(Invoice $invoice): void
	{
		$this->invoice = $invoice;
	}


	/**
	 * Generator::addInvoice()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param \Hurah\Invoice\Data\Invoice $invoice
	 * @return self
	 */
	final public function addInvoice(Invoice $invoice): self
	{
		$this->invoice = $invoice;
		return $this;
	}
}
