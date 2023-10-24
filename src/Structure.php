<?php
namespace Hurah\Invoice;

use Hurah\Invoice\Data\ConsumableInvoiceInterface;
use Hurah\Invoice\Data\Invoice;
use Hurah\Invoice\Data\InvoiceInterface;

final class Structure implements StructureInterface
{
	private ConsumableInvoiceInterface $invoice;
    private Invoice\Environment $environment;

	/**
	 * Generator::__construct()
	 */
	public function __construct()
	{
		$this->invoice = new Invoice();
	}
    public function getInvoice(): ConsumableInvoiceInterface
    {
        return $this->invoice;
    }
    public function setInvoice(ConsumableInvoiceInterface $invoice):self
    {
        $this->invoice = $invoice;
        return $this;
    }
    public function setEnvironment(Invoice\Environment $environment):self
    {
        $this->environment = $environment;
        return $this;
    }
    public function getEnvironment():Invoice\Environment
    {
        return $this->environment;
    }

    public function toArray():array
    {
        return [
            'environment' => $this->environment->toArray(),
            'invoice' => $this->invoice->toArray()
        ];

    }
}
