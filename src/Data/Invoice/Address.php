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
	 * Address::create()
	 * @generate [properties, getters, setters, adders, toArray, createFromArray]
	 */
	public function create(
		string $name,
		string $addressLine1,
		string $addressLine2,
		string $country,
		string $attnName,
		AddressType $addressType
	) {
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
	 * Address::createFromArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param array $array
	 * @return self
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
	 * Address::getName()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getName(): string
	{
		return $this->name;
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
	 * Address::getAddressLine2()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getAddressLine2(): string
	{
		return $this->addressLine2;
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
	 * Address::getAttnName()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getAttnName(): string
	{
		return $this->attnName;
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
	 * Address::toArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return array
	 */
	final public function toArray(): array
	{
		return [
		'name' => $this->getName(),
		'addressLine1' => $this->getAddressLine1(),
		'addressLine2' => $this->getAddressLine2(),
		'country' => $this->getCountry(),
		'attnName' => $this->getAttnName(),
		'addressType' => $this->getAddressType()->toArray(),
		];
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
