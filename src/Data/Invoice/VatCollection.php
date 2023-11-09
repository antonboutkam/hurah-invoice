<?php

namespace Hurah\Invoice\Data\Invoice;

use Hurah\Types\Type\AbstractCollectionDataType;

class VatCollection extends AbstractCollectionDataType
{

	public function add(VatAmount $vat)
	{
		$this->array[] = $vat;
	}
	public function current():VatAmount
	{
		return $this->array[$this->position];
	}
}
