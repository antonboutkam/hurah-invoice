<?php
namespace Hurah\Invoice\Data\Invoice;

final class Company
{
	private string $company_name;
	private string $addressLine1;
	private string $addressLine2;
	private string $country;
	private ?string $attnName = null;
	private string $vatId;
	private string $chamberOfCommerce;


	/**
	 * Constructor
	 * @generate [properties, getters, setters, adders, createFromArray, toArray]
	 */
	public static function create(
		string $company_name,
		string $addressLine1,
		string $addressLine2,
		string $country,
		string $attnName,
		string $vatId,
		string $chamberOfCommerce
	):self {
		$new = new self();
		$new->company_name = $company_name;
		$new->addressLine1 = $addressLine1;
		$new->addressLine2 = $addressLine2;
		$new->country = $country;
		$new->attnName = $attnName;
		$new->vatId = $vatId;
		$new->chamberOfCommerce = $chamberOfCommerce;
		return $new;
	}


	/**
	 * Company::toArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return array
	 */
	final public function toArray(): array
	{
		$result = [];
		$result['company_name'] = $this->getCompanyName();
		$result['addressLine1'] = $this->getAddressLine1();
		$result['addressLine2'] = $this->getAddressLine2();
		$result['country'] = $this->getCountry();
		$result['attnName'] = $this->getAttnName();
		$result['chamberOfCommerce'] = $this->getChamberOfCommerce();
		$result['vatId'] = $this->getVatId();
		return $result;
	}


	/**
	 * Company::getAddressLine1()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function setChamberOfCommerce(string $chamberOfCommerce): self
	{
		$this->chamberOfCommerce = $chamberOfCommerce;
		return $this;
	}
	final public function getChamberOfCommerce(): string
	{
		return $this->chamberOfCommerce;
	}

	/**
	 * Company::getAddressLine1()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getAddressLine1(): string
	{
		return $this->addressLine1;
	}


	/**
	 * Company::getAddressLine2()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getAddressLine2(): string
	{
		return $this->addressLine2;
	}


	/**
	 * Company::getCountry()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getCountry(): string
	{
		return $this->country;
	}


	/**
	 * Company::getAttnName()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getAttnName(): ?string
	{
		return $this->attnName;
	}


	/**
	 * Company::getVatId()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getVatId(): string
	{
		return $this->vatId;
	}


	/**
	 * Company::setAddressLine1()
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
	 * Company::setAddressLine2()
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
	 * Company::setCountry()
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
	 * Company::setAttnName()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param ?string $attnName
	 * @return self
	 */
	final public function setAttnName(?string $attnName): self
	{
		$this->attnName = $attnName;
		return $this;
	}


	/**
	 * Company::setVatId()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $vatId
	 * @return self
	 */
	final public function setVatId(string $vatId): self
	{
		$this->vatId = $vatId;
		return $this;
	}


	/**
	 * Company::createFromArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param array $array
	 * @return self
	 */
	final public static function createFromArray(array $array): self
	{
		$new = new self();
		if(isset($array['company_name'])){
			$new->setCompanyName($array['company_name']);
		}
		if(isset($array['addressLine1'])){
			$new->setAddressLine1($array['addressLine1']);
		}
		if(isset($array['addressLine2'])){
			$new->setAddressLine2($array['addressLine2']);
		}
		if(isset($array['country'])){
			$new->setCountry($array['country']);
		}
		if(isset($array['attnName'])){
			$new->setAttnName($array['attnName']);
		}
		if(isset($array['vatId'])){
			$new->setVatId($array['vatId']);
		}
		return $new;
	}


	/**
	 * Company::getCompanyName()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getCompanyName(): string
	{
		return $this->company_name;
	}


	/**
	 * Company::setCompanyName()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $company_name
	 * @return self
	 */
	final public function setCompanyName(string $company_name): self
	{
		$this->company_name = $company_name;
		return $this;
	}
}
