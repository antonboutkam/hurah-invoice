<?php
namespace Hurah\Invoice;

use Hurah\Invoice\Data\Invoice;
use Hurah\Invoice\Data\InvoiceInterface;

final class Structure implements StructureInterface
{
	private InvoiceInterface $invoice;


	/**
	 * Generator::__construct()
	 */
	public function __construct()
	{
		$this->invoice = new Invoice();
	}
    public function getInvoice(): InvoiceInterface
    {
        return $this->invoice;
    }
    public function setInvoice(InvoiceInterface $invoice):self
    {
        $this->invoice = $invoice;
        return $this;
    }

    public function toArray():array
    {
        return [
            'invoice' => $this->invoice->toArray()
        ];

    }
}
