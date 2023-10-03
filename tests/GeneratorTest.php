<?php

namespace Test\Hurah\Invoice;

use Hurah\Invoice\Data\Invoice;

class GeneratorTest extends AbstractTestCase
{

    public function testGetInvoice()
    {
        $sNumber = '111112';
        $invoice = $this->generator->getInvoice();
        $invoice->setNumber($sNumber);

        $this->assertEquals($sNumber, $this->generator->getInvoice()->getNumber(), "Invoice numbers are not the same");
    }


    public function testAddInvoice()
    {
        $oInvoice = new Invoice();
        $oInvoice->setCustomer($oCustomer = new Invoice\Customer());
        $oCustomer->setCustomerName($sExpected = 'Anton Boutkam');
        $this->generator->addInvoice($oInvoice);

        $this->assertEquals($sExpected, $this->generator->getInvoice()->getCustomer()->getCustomerName());
    }

    public function testToArray()
    {
        $aGenerator =  $this->generator->toArray();
        $this->assertIsArray($aGenerator);
    }

    public function testSetInvoice()
    {
        $sExpected = '111';
        $oOrder = $this->generator->getInvoice()->getOrder();
        $oOwnCompany = $this->generator->getInvoice()->getOwnCompany();
        $oCustomer = $this->generator->getInvoice()->getCustomer();
        $oInvoice = Invoice::create($sExpected, $oOrder, $oOwnCompany, $oCustomer);
        $oInvoice->setNumber($sExpected);
        $this->generator->setInvoice($oInvoice);
        $this->assertEquals($sExpected, $oInvoice->getNumber());
    }
}
