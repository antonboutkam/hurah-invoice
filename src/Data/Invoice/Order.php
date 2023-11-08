<?php
namespace Hurah\Invoice\Data\Invoice;

use Hurah\Types\Exception\InvalidArgumentException;
use Hurah\Types\Type\Physical\Person\FullName;
use DateTime;

final class Order
{
	private DateTime $createdOn;
	private OrderItemCollection $orderItemCollection;
	private string $number;

	private ?FullName $createdBy = null;

	private ?string $customerReference = null;

	/**
	 * Constructor
	 * @generate [properties, getters, setters, adders, createFromArray, toArray]
	 */
	public static function create(string $number, FullName $createdBy, OrderItemCollection $orderItemCollection, DateTime $createdOn, string $customerReference): Order
	{
		$new = new self();
		$new->number = $number;
		$new->orderItemCollection = $orderItemCollection;
		$new->createdOn = $createdOn;
		$new->createdBy = $createdBy;
		$new->customerReference = $customerReference;

		return $new;
	}

	public static function createFromArray($order): self
	{
		$new = new self();
		$new->number = $order['number'];

		$new->orderItemCollection = OrderItemCollection::make($order['orderItemCollection']);
		if(is_int($order['createdOn']))
		{
			$new->createdOn = (new DateTime())->setTimestamp($order['createdOn']);
		}
		elseif($order['createdOn'] instanceof DateTime)
		{
			$new->createdOn = $order['createdOn'];
		}
		else
		{
			throw new InvalidArgumentException("createdOn is empty or of an unimplemented type");
		}

		$new->customerReference = $order['customerReference'] ?? '';

		$new->setCreatedBy(FullName::createString($order['firstName'], $order['familyName']));

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
		$result['orderItemCollection'] = $this->getOrderItemCollection()->toArray();
		$result['createdBy'] = $this->getCreatedBy();
		$result['firstName'] = $this->getCreatedBy()->getFirstName();
		$result['familyName'] = $this->getCreatedBy()->getFamilyName();
		$result['createdOn'] = $this->getCreatedOn();
		return $result;
	}
	final public function setCustomerReference(string $customerReference):self
	{
		$this->customerReference = $customerReference;
		return $this;
	}
	final public function getCustomerReference(): ?string
	{
		return $this->customerReference;
	}

	final public function setCreatedBy(?FullName $createdBy):self
	{
		$this->createdBy = $createdBy;
		return $this;
	}
	final public function getCreatedBy(): ?FullName
	{
		return $this->createdBy;
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
