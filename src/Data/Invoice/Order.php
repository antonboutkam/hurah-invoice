<?php
namespace Hurah\Invoice\Data\Invoice;

use Hurah\Types\Type\Physical\Person;
use DateTime;

final class Order
{
	private DateTime $createdOn;
	private OrderItemCollection $orderItemCollection;
	private string $number;

	private Person $createdBy;

	/**
	 * Constructor
	 * @generate [properties, getters, setters, adders, createFromArray, toArray]
	 */
	public static function create(string $number, Person $createdBy, OrderItemCollection $orderItemCollection, DateTime $createdOn): Order
	{
		$new = new self();
		$new->number = $number;
		
		$new->orderItemCollection = $orderItemCollection;
		$new->createdOn = $createdOn;
		return $new;
	}


	/**
	 * Order::toArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return array
	 */
	final public function toArray(): array
	{
		$result = [];
		$result['number'] = $this->getNumber();
		$result['orderItemCollection'] = (string) $this->getOrderItemCollection();
		$result['createdOn'] = $this->getCreatedOn();
		return $result;
	}


	/**
	 * Order::getCreatedOn()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return DateTime
	 */
	final public function getCreatedOn(): DateTime
	{
		return $this->createdOn;
	}


	/**
	 * Order::setCreatedOn()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param DateTime $createdOn
	 * @return self
	 */
	final public function setCreatedOn(DateTime $createdOn): self
	{
		$this->createdOn = $createdOn;
		return $this;
	}



	/**
	 * Order::getOrderItemCollection()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return OrderItemCollection
	 */
	final public function getOrderItemCollection(): OrderItemCollection
	{
		return $this->orderItemCollection;
	}


	/**
	 * Order::setOrderItemCollection()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param OrderItemCollection $orderItemCollection
	 * @return self
	 */
	final public function setOrderItemCollection(OrderItemCollection $orderItemCollection): self
	{
		$this->orderItemCollection = $orderItemCollection;
		return $this;
	}


	/**
	 * Order::addOrderItemCollection()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param OrderItemCollection $orderItemCollection
	 * @return self
	 */
	final public function addOrderItemCollection(OrderItemCollection $orderItemCollection): self
	{
		if(!isset($this->orderItemCollection)){
			$this->orderItemCollection = new OrderItemCollection();
		}
		foreach($orderItemCollection as $orderItem){
			$this->orderItemCollection->add($orderItem);
		}
		return $this;
	}


	/**
	 * Order::getNumber()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getNumber(): string
	{
		return $this->number;
	}


	/**
	 * Order::setNumber()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $number
	 * @return self
	 */
	final public function setNumber(string $number): self
	{
		$this->number = $number;
		return $this;
	}
}
