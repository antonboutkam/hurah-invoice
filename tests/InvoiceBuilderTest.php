<?php

namespace Test\Hurah\Invoice;

use DateInterval;
use DateTime;
use Hurah\Invoice\Data\Invoice;
use Hurah\Invoice\Data\Invoice\PaymentDetails;
use Hurah\Invoice\Generator\Document\Type\Pdf;
use Hurah\Invoice\Generator\Result\Handler\ReturnString;
use Hurah\Invoice\InvoiceBuilder;
use Hurah\Types\Type\Bic;
use Hurah\Types\Type\Iban;


class InvoiceBuilderTest extends AbstractTestCase
{

    public function testInit()
    {
        $oInvoiceBuilder = InvoiceBuilder::init($this->structure);
        $this->assertTrue(strlen($oInvoiceBuilder->getTwigTemplate()) > 5);
    }
    public function testMakeInvoice()
    {
        $oInvoiceBuilder = InvoiceBuilder::init($this->structure);
        $type = new Pdf();
        $oInvoiceBuilder->setHandler(new ReturnString($type));
        $sPdfDocument = $oInvoiceBuilder->makeInvoice();
        $sFileName = '/tmp/' . time();
        file_put_contents($sFileName, $sPdfDocument);
        $mimeType = mime_content_type($sFileName);
        unlink($sFileName);
        $type = new \Hurah\Invoice\Generator\Document\Type\Html();
        $this->assertEquals('application/pdf', $mimeType, 'Type: ' . $mimeType);
        $this->assertTrue(strlen($sPdfDocument) > 30);

        $oInvoiceBuilder->setDocumentType($type);
        $oInvoiceBuilder->setHandler(new ReturnString());
        $sHtmlDocument = $oInvoiceBuilder->makeInvoice();
        file_put_contents($sFileName, $sHtmlDocument);
        $mimeType = mime_content_type($sFileName);
        $this->assertEquals('text/html', $mimeType, 'Type: ' . $mimeType);
        $this->assertTrue(strlen($sHtmlDocument) > 1, $sHtmlDocument);
    }
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
		$bIsFullyPaid = false;
        $oOrder = $this->structure->getInvoice()->getOrder();
        $oOwnCompany = $this->structure->getInvoice()->getOwnCompany();
        $oCustomer = $this->structure->getInvoice()->getCustomer();
		$oPayTerm = new DateInterval('P15D');
		$oCreatedOn = (new DateTime())->setTimestamp(1698142544);
		$oPaymentDetails = PaymentDetails::make(new Iban('NL38ABNA0483015741'), new Bic('ABNANL2A'));
		$oInvoice = Invoice::create(
			$sExpected,
			self::createTotals(),
			$oOrder,
			$oOwnCompany,
			$oCustomer,
			$oCreatedOn,
			$oPayTerm,
			$oPaymentDetails,
			$bIsFullyPaid,
			'Binnen 14 dagen'
		);

        $oInvoice->setNumber($sExpected);
        $this->structure->setInvoice($oInvoice);
        $this->assertEquals($sExpected, $oInvoice->getNumber());
    }
}
