<?php

namespace Test\Hurah\Invoice\Data;

use Hurah\Invoice\Data\Invoice;
use PHPUnit\Framework\TestCase;
use Test\Hurah\Invoice\AbstractTestCase;

class InvoiceTest extends AbstractTestCase
{

    public function testCreateFromArray()
    {
        $aInvoice = $this->generator->getInvoice()->toArray();
        $oInvoice = Invoice::createFromArray($aInvoice);
        $this->assertEquals($this->generator->getInvoice()->getNumber(), $oInvoice->getNumber());
    }

}
