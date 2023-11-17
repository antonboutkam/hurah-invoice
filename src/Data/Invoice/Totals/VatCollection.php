<?php

namespace Hurah\Invoice\Data\Invoice\Totals;

use Hurah\Types\Type\AbstractCollectionDataType;

class VatCollection extends AbstractCollectionDataType
{

	public function add(VatAmount $vat):self
	{
		foreach($this as $vatAmount)
		{
			if($vatAmount->getPercentage() == $vat->getPercentage())
			{
				$vatAmount->setVatOn($vatAmount->getVatOn() + $vat->getVatOn());
				return $this;
			}
		}
		$this->array[] = $vat;
		return $this;
	}
	public function current():VatAmount
	{
		return $this->array[$this->position];
	}
	public function toArray():array
	{
		$aOut = [];
		foreach($this as $vatAmount)
		{
			$aOut[$vatAmount->getPercentage()] = $vatAmount;
		}
		return $aOut;
	}
}
