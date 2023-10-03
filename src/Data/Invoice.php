<?php
namespace Hurah\Invoice\Data;

use Hurah\Invoice\Data\Invoice\Customer;
use Hurah\Invoice\Data\Invoice\Order;
use Hurah\Invoice\Data\Invoice\Company;

final class Invoice
{
	private Order $order;
	private Company $supplier;
	private Customer $customer;
	private string $number;
	private Company $ownCompany;


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
	public static function create(string $number, Order $order, Company $ownCompany, Customer $customer): self
	{
		$new = new self();
		$new->number = $number;
		$new->order = $order;
		$new->ownCompany = $ownCompany;
		$new->customer = $customer;
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
	 * @return void
	 */
	final public function setOrder(Order $order): void
	{
		$this->order = $order;
	}


	/**
	 * Invoice::addOrder()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param Order $order
	 * @return self
	 */
	final public function addOrder(Order $order): self
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
	 * Invoice::setNumber()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $number
	 * @return void
	 */
	final public function setNumber(string $number): void
	{
		$this->number = $number;
	}


	/**
	 * Invoice::addNumber()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $number
	 * @return self
	 */
	final public function addNumber(string $number): self
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
	 * @return void
	 */
	final public function setOwnCompany(Company $ownCompany): void
	{
		$this->ownCompany = $ownCompany;
	}


	/**
	 * Invoice::setCustomer()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param Customer $customer
	 * @return void
	 */
	final public function setCustomer(Customer $customer): void
	{
		$this->customer = $customer;
	}


	/**
	 * Invoice::addOwnCompany()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param Company $ownCompany
	 * @return self
	 */
	final public function addOwnCompany(Company $ownCompany): self
	{
		$this->ownCompany = $ownCompany;
		return $this;
	}


	/**
	 * Invoice::addCustomer()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param Customer $customer
	 * @return self
	 */
	final public function addCustomer(Customer $customer): self
	{
		$this->customer = $customer;
		return $this;
	}
}
