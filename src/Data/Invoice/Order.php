<?php
namespace Hurah\Invoice\Data\Invoice;

use DateTime;
use Hurah\Invoice\Data\Invoice\Order\OrderItemCollection;

final class Order
{
	private OrderItemCollection $orderItems;
	private DateTime $createdOn;


	/**
	 * Constructor
	 * @generate [properties, getters, setters, adders, createFromArray, toArray]
	 */
	public static function create(OrderItemCollection $orderItems, DateTime $createdOn): Order
	{
		$new = new self();
		$new->orderItems = $orderItems;
		$new->createdOn = $createdOn;
		return $new;
	}


	/**
	 * Order::getOrderItems()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return OrderItemCollection
	 */
	final public function getOrderItems(): OrderItemCollection
	{
		return $this->orderItems;
	}


	/**
	 * Order::setOrderItems()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param \Hurah\Invoice\Data\Invoice\Order\OrderItemCollection $orderItems
	 */
	final public function setOrderItems(OrderItemCollection $orderItems): void
	{
		$this->orderItems = $orderItems;
	}


	/**
	 * Order::toArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return array
	 */
	final public function toArray(): array
	{
		return [
		'orderItems' => $this->getOrderItems()->toArray(),
		'createdOn' => $this->getCreatedOn(),
		];
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
	 * @param \DateTime $createdOn
	 */
	final public function setCreatedOn(DateTime $createdOn): void
	{
		$this->createdOn = $createdOn;
	}


	/**
	 * Order::addOrderItems()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param \Hurah\Invoice\Data\Invoice\Order\OrderItemCollection $orderItems
	 * @return self
	 */
	final public function addOrderItems(OrderItemCollection $orderItems): self
	{
		$this->orderItems = $orderItems;
		return $this;
	}


	/**
	 * Order::addCreatedOn()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param \DateTime $createdOn
	 * @return self
	 */
	final public function addCreatedOn(DateTime $createdOn): self
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
	final public static function createFromArray(array $array): self
	{
		$new = new self();
		$oOrderItems = OrderItemCollection::createFromArray($array['orderItems']);
		$new->setOrderItems($oOrderItems);
		$new->setCreatedOn($array['createdOn']);
		return $new;
	}
}
