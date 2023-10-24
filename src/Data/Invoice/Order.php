<?php
namespace Hurah\Invoice\Data\Invoice;

use DateTime;

final class Order
{
	private DateTime $createdOn;
	private OrderItemCollection $orderItemCollection;


	/**
	 * Constructor
	 * @generate [properties, getters, setters, adders, createFromArray, toArray]
	 */
	public static function create(OrderItemCollection $orderItemCollection, DateTime $createdOn): Order
	{
		$new = new self();
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
	 * Order::createFromArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param array $array
	 * @return self
	 */
	public static function createFromArray(array $array): self
	{
		$new = new self();
		if(isset($array['orderItemCollection']) && is_array($array['orderItemCollection'])){
			$oOrderItemCollection = OrderItemCollection::make($array['orderItemCollection']);
			$new->setOrderItemCollection($oOrderItemCollection);
		}
		if(isset($array['createdOn'])){
			$new->setCreatedOn($array['createdOn']);
		}
		return $new;
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
}
