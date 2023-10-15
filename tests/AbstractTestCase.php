<?php
namespace Test\Hurah\Invoice;

use Hurah\Invoice\Data\Invoice;
use Hurah\Invoice\Structure;
use Hurah\Types\Type\DnsName;
use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{
	protected Structure $structure;


	public function setUp(): void
	{
		$this->structure = new Structure();

        $oEnvironment = new Invoice\Environment();
        $this->structure->setEnvironment($oEnvironment);

        $oEnvironment->setAssetsHostname(new DnsName('antonboutkam.nl'));
        $oEnvironment->setFileHostname(new DnsName('static.antonboutkam.nl'));
		$oCustomer = new Invoice\Customer();
        $oCustomer->setVatId('19495634');
        $oCustomer->setCustomerNumber('99999');
        $oCustomer->setCustomerName('Anton Boutkam');

        $oInvoiceAddress = new Invoice\Address();
        $oInvoiceAddress->setName('Nui Boutkam');
        $oInvoiceAddress->setAddressLine1('Amstelstraat 1');
        $oInvoiceAddress->setAddressLine2('1421AW Uithoorn');
        $oInvoiceAddress->setAttnName('Anton Boutkam');
        $oInvoiceAddress->setCountry('Nederland');
        $oInvoiceAddress->setAddressType(new Invoice\AddressType(Invoice\AddressType::INVOICE));
        $oCustomer->addAddress($oInvoiceAddress);

        $oDeliveryAddress = new Invoice\Address();
        $oDeliveryAddress->setName('Nui Boutkam');
        $oDeliveryAddress->setAddressLine1('Amstelstraat 1');
        $oDeliveryAddress->setAddressLine2('1421AW Uithoorn');
        $oDeliveryAddress->setAttnName('Anton Boutkam');
        $oDeliveryAddress->setCountry('Nederland');
        $oDeliveryAddress->setAddressType(new Invoice\AddressType(Invoice\AddressType::DELIVERY));
        $oCustomer->addAddress($oDeliveryAddress);

        /*
        CustomerNumber(1111);
        $oCustomer->add
		$oCustomer->ad
		    ->addAddressLine1("Amstelstraat 1")
		    ->addAddressLine2('1421AW UITHOORN')
		    ->addAttnName('Anton Boutkam')
		    ->addCountry('Nederland')
		    ->addCustomerNumber('111222333')
		    ->addVatId();
*/
		$oOrderItem = new Invoice\Order\OrderItem();
		$oOrderItem->setDescription('xxx');
		$oOrderItem->setSubDescription('yyy');
        $oOrderItem->setQuantity(1);
        $oOrderItem->setUnit('stuk');
        $oOrderItem->setUnitPrice(5.10);
		$oOrderItem->setVat(21);
		$oOrderItemCollection = new Invoice\Order\OrderItemCollection();
		$oOrderItemCollection->add($oOrderItem);

		$oOrder = new Invoice\Order();
		$oOrder
		    ->addCreatedOn((new \DateTime())->setTimestamp(time()))
		    ->addOrderItems($oOrderItemCollection);

		$oCompany = new Invoice\Company();
        $oCompany
		    ->addCompanyName('Company name')
		    ->addVatId('91919191919')
		    ->addCountry('Nederland')
		    ->addAttnName('Anton Boutkam')
		    ->addAddressLine1('Amstelstraat 1')
		    ->addAddressLine2('1421AW UITHOORN');
		$oInvoice = new Invoice();
		$oInvoice->setNumber('123213')
		    ->setCustomer($oCustomer)
		    ->setOrder($oOrder)
		    ->setOwnCompany($oCompany);

		$this->structure->setInvoice($oInvoice);
	}



}
