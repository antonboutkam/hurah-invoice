<?php

namespace Test\Hurah\Invoice;

use Hurah\Invoice\Data\Invoice;

class GeneratorTest extends AbstractTestCase
{

    public function testGetInvoice()
    {
        $sNumber = '111112';
        $invoice = $this->structure->getInvoice();
        $invoice->setNumber($sNumber);

        $this->assertEquals($sNumber, $this->structure->getInvoice()->getNumber(), "Invoice numbers are not the same");
    }


    public function testAddInvoice()
    {
        $oInvoice = new Invoice();
        $oInvoice->setCustomer($oCustomer = new Invoice\Customer());
        $oCustomer->setCustomerName($sExpected = 'Anton Boutkam');
        $this->structure->setInvoice($oInvoice);

        $this->assertEquals($sExpected, $this->structure->getInvoice()->getCustomer()->getCustomerName());
    }

    public function testToArray()
    {
        $aGenerator =  $this->structure->toArray();
        $this->assertIsArray($aGenerator);
    }

    public function testSetInvoice()
    {
        $sExpected = '111';
        $oOrder = $this->structure->getInvoice()->getOrder();
        $oOwnCompany = $this->structure->getInvoice()->getOwnCompany();
        $oCustomer = $this->structure->getInvoice()->getCustomer();
        $oInvoice = Invoice::create($sExpected, $oOrder, $oOwnCompany, $oCustomer);
        $oInvoice->setNumber($sExpected);
        $this->structure->setInvoice($oInvoice);
        $this->assertEquals($sExpected, $oInvoice->getNumber());
    }
}
