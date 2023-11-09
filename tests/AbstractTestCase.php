<?php
namespace Test\Hurah\Invoice;

use DateInterval;
use DateTime;
use Hurah\Invoice\Data\Invoice\VatCollection;
use Hurah\Invoice\Data\Invoice\OrderItemCollection;
use Hurah\Invoice\Data\Invoice\Totals;
use Hurah\Invoice\Data\Invoice\Company;
use Hurah\Invoice\Data\Invoice\VatAmount;
use Hurah\Invoice\Data\Invoice\Environment;
use Hurah\Invoice\Data\Invoice\Order;
use Hurah\Invoice\Data\Invoice\OrderItem;
use Hurah\Invoice\Data\Invoice\Customer;
use Hurah\Invoice\Data\Invoice\Address;
use Hurah\Invoice\Data\Invoice\AddressType;
use Hurah\Invoice\Data\Invoice;
use Hurah\Invoice\Structure;
use Hurah\Types\Type\DnsName;
use Hurah\Types\Type\Physical\Person\FullName;
use PHPUnit\Framework\TestCase;

abstract class  AbstractTestCase extends TestCase
{
	protected Structure $structure;


	public static function createTotals():Totals
	{
		$oVatCollection = new VatCollection();
		$oVatCollection->add(VatAmount::create(21, 121));
		$oVatCollection->add(VatAmount::create(21, 121));
		$oVatCollection->add(VatAmount::create(6, 100));
		return Totals::create(121, 100, 21, $oVatCollection);
	}
	public function setUp(): void
	{
		$this->structure = new Structure();

        $oEnvironment = new Environment();
        $this->structure->setEnvironment($oEnvironment);

        $oEnvironment->setAssetsHostname(new DnsName('antonboutkam.nl'));
        $oEnvironment->setFileHostname(new DnsName('static.antonboutkam.nl'));
		$oCustomer = new Customer();
		$oCustomer->setCustomerEmail('anton@blabla.com');
		$oCustomer->setVatId('19495634');
		$oCustomer->setCustomerId(123);
        $oCustomer->setCustomerNumber('99999');
        $oCustomer->setCustomerName('Anton Boutkam');

        $oInvoiceAddress = new Address();
		$oInvoiceAddress->setName('Nui Boutkam');
        $oInvoiceAddress->setAddressLine1('Amstelstraat 1');
        $oInvoiceAddress->setAddressLine2('1421AW Uithoorn');
        $oInvoiceAddress->setAttnName('Anton Boutkam');
        $oInvoiceAddress->setCountry('Nederland');
        $oInvoiceAddress->setAddressType(new AddressType(AddressType::INVOICE));
        $oCustomer->addAddress($oInvoiceAddress);

        $oDeliveryAddress = new Address();
        $oDeliveryAddress->setName('Nui Boutkam');
        $oDeliveryAddress->setAddressLine1('Amstelstraat 1');
        $oDeliveryAddress->setAddressLine2('1421AW Uithoorn');
        $oDeliveryAddress->setAttnName('Anton Boutkam');
        $oDeliveryAddress->setCountry('Nederland');
        $oDeliveryAddress->setAddressType(new AddressType(AddressType::DELIVERY));
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
		$oOrderItem = new OrderItem();
		$oOrderItem->setArticleNumber('123123');
		$oOrderItem->setDescription('xxx');
		$oOrderItem->setSubDescription('yyy');
        $oOrderItem->setQuantity(1);
        $oOrderItem->setUnit('stuk');
        $oOrderItem->setUnitPrice(5.10);
		$oOrderItem->setVat(21);
		$oOrderItemCollection = new OrderItemCollection();
		$oOrderItemCollection->add($oOrderItem);

		$oOrder = new Order();
		$oOrder
			->setNumber('20230000123')
			->setCreatedBy(FullName::createString('Anton', 'Boutkam'))
			->setCustomerReference('HM0000232')
		    ->setCreatedOn((new \DateTime())->setTimestamp(time()))
		    ->setOrderItemCollection($oOrderItemCollection);

		$oCompany = new Company();
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
			->setTotals(self::createTotals())
			->setPayTerm(new DateInterval('P1D'))
			->setPaymentConditions("Vooruit betalen")
			->setIsFullyPaid(false)
			->setOwnCompany($oCompany);

		$this->structure->setInvoice($oInvoice);
	}



}
