<?php

namespace Hurah\Invoice\Data\Invoice\Totals;

use Hurah\Types\Type\AbstractDataType;
use Hurah\Types\Type\IGenericDataType;

/**
 *
 */
class Discount extends AbstractDataType implements IGenericDataType
{

	private float $discount;
	private int $type;
	private float $discountOn;
	private float $discountAmount;

	const PERCENTAGE = 0;
	const AMOUNT = 1;

	/**
	 * VatAmount::create()
	 *
	 * @return static
	 */
	public static function create(float $discount, int $iType): self {

		$current = new self();
		$current->setDiscount($discount);
		$current->setType($iType);
		return $current;
	}

	public function toArray():array
	{
		return [
			'discount' => $this->getDiscount(),
			'type' => $this->getType()
		];
	}

	public static function fromArray(array $aData):self
	{
		return self::create(
			$aData['discount'],
			$aData['type']
		);
	}

	/**
	 * @return float
	 */
	public function getDiscount(): float
	{
		return $this->discount;
	}

	/**
	 * @param float $discount
	 *
	 * @return Discount
	 */
	public function setDiscount(float $discount): Discount
	{
		$this->discount = $discount;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 *
	 * @return Discount
	 */
	public function setType(string $type): Discount
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getDiscountOn(): float
	{
		return $this->discountOn;
	}

	/**
	 * @param float $discountOn
	 *
	 * @return Discount
	 */
	public function setDiscountOn(float $discountOn): Discount
	{
		$this->discountOn = $discountOn;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getDiscountAmount(): float
	{
		return $this->discountAmount;
	}

	/**
	 * @param float $discountAmount
	 *
	 * @return Discount
	 */
	public function setDiscountAmount(float $discountAmount): Discount
	{
		$this->discountAmount = $discountAmount;
		return $this;
	}


}
