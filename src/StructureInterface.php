<?php

namespace Hurah\Invoice;

use Hurah\Invoice\Data\ConsumableInvoiceInterface;
use Hurah\Invoice\Data\Invoice\Environment;

interface StructureInterface
{
    public function getInvoice(): ConsumableInvoiceInterface;

    public function getEnvironment(): Environment;
}
