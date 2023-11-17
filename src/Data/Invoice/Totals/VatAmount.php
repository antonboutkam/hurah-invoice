<?php

namespace Hurah\Invoice\Data\Invoice\Totals;

use Hurah\Types\Type\AbstractDataType;
use Hurah\Types\Type\IGenericDataType;

/**
 *
 */
class VatAmount extends AbstractDataType implements IGenericDataType
{

	private float $percentage;
	private float $vatOn;
	private float $vatDue;


	/**
	 * VatAmount::create()
	 *
	 * @return static
	 */
	public static function create(float $percentage, float $vatOn): self {

		$current = new self();
		$current->setPercentage($percentage);
		$current->setVatOn($vatOn);
		return $current;
	}


	public function __toString(): string
	{
		return $this->percentage;
	}

	/**
	 * @return float
	 */
	public function getPercentage(): float
	{
		return $this->percentage;
	}

	/**
	 * @param float $percentage
	 *
	 * @return VatAmount
	 */
	public function setPercentage(float $percentage): VatAmount
	{
		$this->percentage = $percentage;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getVatOn(): float
	{
		return $this->vatOn;
	}

	/**
	 * @param float $vatOn
	 *
	 * @return VatAmount
	 */
	public function setVatOn(float $vatOn): VatAmount
	{
		$this->vatOn = $vatOn;
		return $this;
	}
	/**
	 * @return float
	 */
	public function getVatDue(): float
	{
		if(empty($this->vatDue))
		{
			$this->vatDue = ($this->vatOn / 100) * $this->percentage;
		}
		return $this->vatDue;
	}
	public function setVatDue(float $vatDue):void
	{
		$this->vatDue = $vatDue;
	}

	public function toArray():array
	{
		return [
			'percentage' => $this->getPercentage(),
			'vat_on' => $this->getVatOn(),
			'vat_due' => $this->getVatDue()
		];
	}

}
