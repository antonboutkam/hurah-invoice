<?php
namespace Test\Hurah\Invoice;

use DateInterval;
use DateTime;
use Hurah\Invoice\Data\Invoice;
use Hurah\Invoice\Structure;
use Hurah\Types\Type\DnsName;
use Hurah\Types\Type\Physical\Person\FullName;
use PHPUnit\Framework\TestCase;

abstract class  AbstractTestCase extends TestCase
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
		$oCustomer->setCustomerEmail('anton@blabla.com');
		$oCustomer->setVatId('19495634');
		$oCustomer->setCustomerId(123);
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
		$oOrderItem = new Invoice\OrderItem();
		$oOrderItem->setDescription('xxx');
		$oOrderItem->setSubDescription('yyy');
        $oOrderItem->setQuantity(1);
        $oOrderItem->setUnit('stuk');
        $oOrderItem->setUnitPrice(5.10);
		$oOrderItem->setVat(21);
		$oOrderItemCollection = new Invoice\OrderItemCollection();
		$oOrderItemCollection->add($oOrderItem);

		$oOrder = new Invoice\Order();
		$oOrder
			->setNumber('20230000123')
			->setCreatedBy(FullName::createString('Anton', 'Boutkam'))
			->setCustomerReference('HM0000232')
		    ->setCreatedOn((new \DateTime())->setTimestamp(time()))
		    ->setOrderItemCollection($oOrderItemCollection);

		$oCompany = new Invoice\Company();
        $oCompany
		    ->setCompanyName('Company name')
		    ->setVatId('91919191919')
			->setChamberOfCommerce('0982782923')
		    ->setCountry('Nederland')
		    ->setAttnName('Anton Boutkam')
		    ->setAddressLine1('Amstelstraat 1')
		    ->setAddressLine2('1421AW UITHOORN');
		$oInvoice = new Invoice();
		$oInvoice
			->setNumber('123213')
			->setCreatedOn((new DateTime())->setTimestamp(1698142544))
		    ->setCustomer($oCustomer)
		    ->setOrder($oOrder)
			->setPayTerm(new DateInterval('P1D'))
			->setPaymentConditions("Vooruit betalen")
			->setIsFullyPaid(false)
			->setOwnCompany($oCompany);

		$this->structure->setInvoice($oInvoice);
	}



}
