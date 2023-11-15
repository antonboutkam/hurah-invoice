<?php
namespace Hurah\Invoice\Data\Invoice;

final class OrderItem
{
	private ?string $articleNumber = null;
	private ?string $description;
	private ?string $subDescription = null;
	private float $unitPrice;
	private float $quantity;
	private int $vat;
	private ?string $unit = null;
	private ?string $discount = null;
	private ?string $packaging = null;
	private ?int $weight = null;




	/**
	 * OrderItem::create()
	 * @generate [properties, getters, setters, createFromArray, toArray]
	 */
	public static function create(
		?string $articleNumber,
		?string $description,
		?string $subDescription,
		float $unitPrice,
		string $unit,
		float $quantity,
		int $vat
	): self {
		$new = new self();
		$new->articleNumber = $articleNumber;
		$new->description = $description;
		$new->subDescription = $subDescription;
		$new->unitPrice = $unitPrice;
		$new->unit = $unit;
		$new->quantity = $quantity;
		$new->vat = $vat;
		return $new;
	}


	/**
	 * OrderItem::createFromArray()
	 * Make this method final to enable code generation.
	 */
	final public static function createFromArray(array $array): self
	{
		$new = new self();
		$new->setArticleNumber($array['articleNumber']);
		$new->setDescription($array['description']);
		$new->setSubDescription($array['subDescription']);
		$new->setUnitPrice($array['unitPrice']);
		$new->setUnit($array['unit']);
		$new->setQuantity($array['quantity']);
		$new->setVat($array['vat']);
		return $new;
	}


	/**
	 * OrderItem::toArray()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return array
	 */
	final public function toArray(): array
	{
		$result = [];
		$result['articleNumber'] = $this->getArticleNumber();
		$result['description'] = $this->getDescription();
		$result['subDescription'] = $this->getSubDescription();
		$result['unitPrice'] = $this->getUnitPrice();
		$result['unit'] = $this->getUnit();
		$result['quantity'] = $this->getQuantity();
		$result['vat'] = $this->getVat();
		return $result;
	}


	/**
	 * OrderItem::getDescription()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getDescription(): ?string
	{
		return $this->description;
	}


	/**
	 * OrderItem::getSubDescription()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getSubDescription(): ?string
	{
		return $this->subDescription;
	}


	/**
	 * OrderItem::getUnitPrice()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return float
	 */
	final public function getUnitPrice(): float
	{
		return $this->unitPrice;
	}


	/**
	 * @return string
	 */
	public function getArticleNumber(): ?string
	{
		return $this->articleNumber;
	}

	/**
	 * @param string|null $articleNumber
	 *
	 * @return self
	 */
	public function setArticleNumber(?string $articleNumber): OrderItem
	{
		$this->articleNumber = $articleNumber;
		return $this;
	}
	/**
	 * OrderItem::getQuantity()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return float
	 */
	final public function getQuantity(): float
	{
		return $this->quantity;
	}


	/**
	 * OrderItem::getVat()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return int
	 */
	final public function getVat(): int
	{
		return $this->vat;
	}


	/**
	 * OrderItem::setDescription()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 *
	 * @param string|null $description
	 *
	 * @return self
	 */
	final public function setDescription(?string $description): self
	{
		$this->description = $description;
		return $this;
	}


	/**
	 * OrderItem::setSubDescription()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 *
	 * @param string|null $subDescription
	 *
	 * @return self
	 */
	final public function setSubDescription(?string $subDescription): self
	{
		$this->subDescription = $subDescription;
		return $this;
	}


	/**
	 * OrderItem::setUnitPrice()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param float $unitPrice
	 * @return self
	 */
	final public function setUnitPrice(float $unitPrice): self
	{
		$this->unitPrice = $unitPrice;
		return $this;
	}


	/**
	 * OrderItem::setQuantity()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param float $quantity
	 * @return self
	 */
	final public function setQuantity(float $quantity): self
	{
		$this->quantity = $quantity;
		return $this;
	}


	/**
	 * OrderItem::setVat()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param int $vat
	 * @return self
	 */
	final public function setVat(int $vat): self
	{
		$this->vat = $vat;
		return $this;
	}


	/**
	 * OrderItem::getUnit()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @return string
	 */
	final public function getUnit(): string
	{
		return $this->unit;
	}


	/**
	 * OrderItem::setUnit()
	 * This method is automatically generated, as long as it is marked final it will be generated
	 * @param string $unit
	 * @return self
	 */
	final public function setUnit(?string $unit): self
	{
		$this->unit = $unit;
		return $this;
	}

	/**
	 * @return string
	 */
	final public function getPackaging(): ?string
	{
		return $this->packaging;
	}

	/**
	 * @param string|null $packaging
	 *
	 * @return self
	 */
	final public function setPackaging(?string $packaging): OrderItem
	{
		$this->packaging = $packaging;
		return $this;
	}

	/**
	 * @return int
	 */
	final public function getWeight(): ?int
	{
		return $this->weight;
	}

	/**
	 * @param int|null $weight
	 *
	 * @return self
	 */
	final public function setWeight(?int $weight): OrderItem
	{
		$this->weight = $weight;
		return $this;
	}

	/**
	 * @return string
	 */
	final public function getDiscount(): ?string
	{
		return $this->discount;
	}

	/**
	 * @param string $discount
	 *
	 * @return self
	 */
	final public function setDiscount(?string $discount): OrderItem
	{
		$this->discount = $discount;
		return $this;
	}
}
