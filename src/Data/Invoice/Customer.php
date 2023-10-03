<?php
namespace Hurah\Invoice\Data\Invoice;

final class Customer
{
	private string $customerNumber;
	private AddressCollection $addressCollection;
	private string $vatId;
	private string $customerName;


	/**
	 * Constructor
	 * @generate [properties, getters, setters, adders, createFromArray, toArray]
	 * @return self
	 */
	public static function create(
		string $customerNumber,
		string $customerName,
		string $vatId,
		AddressCollection $addressCollection
	): self {
		$new = new self();
		$new->customerNumber = $customerNumber;
		$new->customerName = $customerName;
		$new->vatId = $vatId;
		$new->addressCollection = $addressCollection;
		return $new;
	}


	/**
	 * Customer::createFromArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param array $array
	 * @return self
	 */
	final public static function createFromArray(array $array): self
	{
		$new = new self();
		$new->setCustomerNumber($array['customerNumber']);
		$new->setCustomerName($array['customerName']);
		$new->setVatId($array['vatId']);
		$oAddressCollection = AddressCollection::createFromArray($array['addressCollection']);
		$new->setAddressCollection($oAddressCollection);
		return $new;
	}


	/**
	 * Customer::toArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return array
	 */
	final public function toArray(): array
	{
		return [
		'customerNumber' => $this->getCustomerNumber(),
		'customerName' => $this->getCustomerName(),
		'vatId' => $this->getVatId(),
		'addressCollection' => $this->getAddressCollection()->toArray(),
		];
	}


	/**
	 * Customer::getCustomerNumber()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getCustomerNumber(): string
	{
		return $this->customerNumber;
	}


	/**
	 * Customer::getAddressCollection()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return AddressCollection
	 */
	final public function getAddressCollection(): AddressCollection
	{
		return $this->addressCollection;
	}


	/**
	 * Customer::setCustomerNumber()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $customerNumber
	 * @return self
	 */
	final public function setCustomerNumber(string $customerNumber): self
	{
		$this->customerNumber = $customerNumber;
		return $this;
	}


	/**
	 * Customer::setAddressCollection()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param AddressCollection $addressCollection
	 * @return self
	 */
	final public function setAddressCollection(AddressCollection $addressCollection): self
	{
		$this->addressCollection = $addressCollection;
		return $this;
	}


	/**
	 * Customer::addAddressCollection()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param AddressCollection $addressCollection
	 * @return self
	 */
	final public function addAddressCollection(AddressCollection $addressCollection): self
	{
		if(!isset($this->addressCollection)){
			$this->addressCollection = new AddressCollection();
		}
		foreach($addressCollection as $address){
			$this->addressCollection->add($address);
		}
		return $this;
	}


	/**
	 * Customer::getVatId()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getVatId(): string
	{
		return $this->vatId;
	}


	/**
	 * Customer::setVatId()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $vatId
	 * @return self
	 */
	final public function setVatId(string $vatId): self
	{
		$this->vatId = $vatId;
		return $this;
	}


	public function addAddress(Address $address)
	{
		if(!isset($this->addressCollection))
		{
		    $this->addressCollection = new AddressCollection();
		}
		$this->addressCollection->add($address);
	}


	/**
	 * Customer::getCustomerName()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getCustomerName(): string
	{
		return $this->customerName;
	}


	/**
	 * Customer::setCustomerName()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $customerName
	 * @return self
	 */
	final public function setCustomerName(string $customerName): self
	{
		$this->customerName = $customerName;
		return $this;
	}
}
