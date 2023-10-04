<?php

namespace Hurah\Invoice;

use Hurah\Invoice\Data\InvoiceInterface;

interface StructureInterface
{
    public function getInvoice(): InvoiceInterface;
}
