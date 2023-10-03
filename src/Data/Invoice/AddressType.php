<?php
namespace Hurah\Invoice\Data\Invoice;

use Hurah\Types\Exception\RuntimeException;

final class AddressType
{
	const DELIVERY = 'delivery';
	const INVOICE = 'invoice';

	private string $type;


	/**
	 * AddressType::__construct()
	 */
	public function __construct(string $type = null)
	{
		if($type)
		{
		    $this->setType($type);
		}
	}


	/**
	 * AddressType::create()
	 * @generate [properties, getters, adders, createFromArray, toArray]
	 */
	public static function create(string $type): self
	{
		$new = new self();
		$new->type = $type;
		return $new;
	}


	/**
	 * AddressType::createFromArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param array $array
	 * @return self
	 */
	final public static function createFromArray(array $array): self
	{
		$new = new self();
		$new->setType($array['type']);
		return $new;
	}


	/**
	 * AddressType::toArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return array
	 */
	final public function toArray(): array
	{
		return [
		'type' => $this->getType(),
		];
	}


	/**
	 * AddressType::getType()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getType(): string
	{
		return $this->type;
	}


	/**
	 * AddressType::setType()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $type
	 * @return self
	 */
	final public function setType(string $type): self
	{
		if(!in_array($type, ['delivery', 'invoice']))
		{
		    throw new RuntimeException("Wrong type {$type}");
		}
		$this->type = $type;
		return $this;
	}
}
