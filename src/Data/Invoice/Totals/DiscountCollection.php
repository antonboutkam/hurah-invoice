<?php

namespace Hurah\Invoice\Data\Invoice\Totals;

use Hurah\Types\Type\AbstractCollectionDataType;

class DiscountCollection extends AbstractCollectionDataType
{
	public function add(Discount $vat):self
	{
		$this->array[] = $vat;
		return $this;
	}
	public function current():Discount
	{
		return $this->array[$this->position];
	}
	public function toArray():array
	{
		$aOut = [];
		foreach($this as $discount)
		{
			$aOut[] = $discount;
		}
		return $aOut;
	}
}
