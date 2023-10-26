<?php
namespace Hurah\Invoice\Data\Invoice;

final class Address
{
	private string $name;
	private string $addressLine1;
	private string $addressLine2;
	private string $country;
	private string $attnName;
	private AddressType $addressType;


	/**
	 * Address::createFromArray()
	 * Make this method final to enable code generation.
	 */
	final public static function createFromArray(array $array): self
	{
		$new = new self();
		$new->setName($array['name']);
		$new->setAddressLine1($array['addressLine1']);
		$new->setAddressLine2($array['addressLine2']);
		$new->setCountry($array['country']);
		$new->setAttnName($array['attnName']);
		$oAddressType = AddressType::createFromArray($array['addressType']);
		$new->setAddressType($oAddressType);
		return $new;
	}


	/**
	 * Address::create()
	 * @generate [properties, getters, setters, adders, toArray, createFromArray]
	 * @return static
	 */
	public function create(
		string $name,
		string $addressLine1,
		string $addressLine2,
		string $country,
		string $attnName,
		AddressType $addressType
	): self {
		$new = new self();
		$new->name = $name;
		$new->addressLine1 = $addressLine1;
		$new->addressLine2 = $addressLine2;
		$new->country = $country;
		$new->attnName = $attnName;
		$new->addressType = $addressType;
		return $new;
	}


	/**
	 * Address::toArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return array
	 */
	final public function toArray(): array
	{
		$result = [];
		$result['name'] = $this->getName();
		$result['addressLine1'] = $this->getAddressLine1();
		$result['addressLine2'] = $this->getAddressLine2();
		$result['country'] = $this->getCountry();
		$result['attnName'] = $this->getAttnName();
		$result['addressType'] = $this->getAddressType()->toArray();
		return $result;
	}


	/**
	 * Address::getName()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getName(): string
	{
		return $this->name;
	}


	/**
	 * Address::setName()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $name
	 * @return self
	 */
	final public function setName(string $name): self
	{
		$this->name = $name;
		return $this;
	}


	/**
	 * Address::getAddressLine1()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getAddressLine1(): string
	{
		return $this->addressLine1;
	}


	/**
	 * Address::setAddressLine1()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $addressLine1
	 * @return self
	 */
	final public function setAddressLine1(string $addressLine1): self
	{
		$this->addressLine1 = $addressLine1;
		return $this;
	}


	/**
	 * Address::getAddressLine2()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getAddressLine2(): string
	{
		return $this->addressLine2;
	}


	/**
	 * Address::setAddressLine2()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $addressLine2
	 * @return self
	 */
	final public function setAddressLine2(string $addressLine2): self
	{
		$this->addressLine2 = $addressLine2;
		return $this;
	}


	/**
	 * Address::getCountry()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getCountry(): string
	{
		return $this->country;
	}


	/**
	 * Address::setCountry()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $country
	 * @return self
	 */
	final public function setCountry(string $country): self
	{
		$this->country = $country;
		return $this;
	}


	/**
	 * Address::getAttnName()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getAttnName(): string
	{
		return $this->attnName;
	}


	/**
	 * Address::setAttnName()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $attnName
	 * @return self
	 */
	final public function setAttnName(string $attnName): self
	{
		$this->attnName = $attnName;
		return $this;
	}


	/**
	 * Address::getAddressType()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return AddressType
	 */
	final public function getAddressType(): AddressType
	{
		return $this->addressType;
	}


	/**
	 * Address::setAddressType()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param AddressType $addressType
	 * @return self
	 */
	final public function setAddressType(AddressType $addressType): self
	{
		$this->addressType = $addressType;
		return $this;
	}
}
