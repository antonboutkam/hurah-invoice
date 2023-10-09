<?php
namespace Hurah\Invoice\Data;

use Hurah\Invoice\Data\Invoice\Customer;
use Hurah\Invoice\Data\Invoice\Note;
use Hurah\Invoice\Data\Invoice\Order;
use Hurah\Invoice\Data\Invoice\Company;

final class Invoice implements InvoiceInterface
{
	private Order $order;
	private Company $supplier;
	private Customer $customer;
	private string $number;
    private ?string $customerReference;
	private Company $ownCompany;
    private ?Note $customerNote;
    private ?Note $ourNote;


	/**
	 * Invoice::__construct()
	 */
	public function __construct()
	{
	}


	/**
	 * Invoice::create()
	 * @generate [properties, getters, setters, adders, createFromArray, toArray]
	 */
	public static function create(string $number, Order $order, Company $ownCompany, Customer $customer, Note $customerNote = null, Note $ourNote = null, ?string $customerReference = null): self
	{
		$new = new self();
		$new->number = $number;
		$new->order = $order;
		$new->ownCompany = $ownCompany;
		$new->customer = $customer;
        $new->customerNote = $customerNote;
        $new->ourNote = $ourNote;
        $new->customerReference = $customerReference;
		return $new;
	}


	/**
	 * Invoice::createFromArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param array $array
	 * @return self
	 */
	final public static function createFromArray(array $array): self
	{
		$new = new self();
		$new->setNumber($array['number']);
		$oOrder = Order::createFromArray($array['order']);
		$new->setOrder($oOrder);
		$oOwnCompany = Company::createFromArray($array['ownCompany']);
		$new->setOwnCompany($oOwnCompany);
		$oCustomer = Customer::createFromArray($array['customer']);
		$new->setCustomer($oCustomer);
		return $new;
	}


	/**
	 * Invoice::toArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return array
	 */
	final public function toArray(): array
	{
		return [
		'number' => $this->getNumber(),
		'order' => $this->getOrder()->toArray(),
		'ownCompany' => $this->getOwnCompany()->toArray(),
		'customer' => $this->getCustomer()->toArray(),
		];
	}


	/**
	 * Invoice::getOrder()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return Order
	 */
	final public function getOrder(): Order
	{
		return $this->order;
	}

	/**
	 * Invoice::setOrder()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param Order $order
	 * @return self
	 */
	final public function setOrder(Order $order): self
	{
		$this->order = $order;
		return $this;
	}

	/**
	 * Invoice::getCustomer()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return Customer
	 */
	final public function getCustomer(): Customer
	{
		return $this->customer;
	}

	/**
	 * Invoice::getNumber()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getNumber(): string
	{
		return $this->number;
	}
    /**
     * Invoice::getCustomerReference()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @return string
     */
    final public function getCustomerReference(): string
    {
        return $this->customerReference;
    }


	/**
	 * Invoice::setNumber()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $number
	 * @return self
	 */
	final public function setNumber(string $number): self
	{
		$this->number = $number;
		return $this;
	}


	/**
	 * Invoice::getOwnCompany()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return Company
	 */
	final public function getOwnCompany(): Company
	{
		return $this->ownCompany;
	}


	/**
	 * Invoice::setOwnCompany()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param Company $ownCompany
	 * @return self
	 */
	final public function setOwnCompany(Company $ownCompany): self
	{
		$this->ownCompany = $ownCompany;
		return $this;
	}


	/**
	 * Invoice::setCustomer()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param Customer $customer
	 * @return self
	 */
	final public function setCustomer(Customer $customer): self
	{
		$this->customer = $customer;
		return $this;
	}
    /**
     * Invoice::getCustomerNote()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @return ?Note
     */
    final public function getCustomerNote(): ?Note
    {
        return $this->customerNote;
    }

    /**
     * Invoice::getOurNote()
     * This method is automatically generated, as long as it is marked final it will be generated
     * @return ?Note
     */
    final public function getOurNote(): ?Note
    {
        return $this->ourNote;
    }

}
