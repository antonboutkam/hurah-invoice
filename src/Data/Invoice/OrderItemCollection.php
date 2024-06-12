<?php
namespace Hurah\Invoice\Data\Invoice;

use Hurah\Types\Type\AbstractCollectionDataType;
use Hurah\Types\Type\IGenericDataType;

class OrderItemCollection extends AbstractCollectionDataType
{
    public static function create(...$oOrderItem):self
    {
        $oCollection = new OrderItemCollection();

        foreach($oOrderItem as $item)
        {
            $oCollection->add($item);
        }
        return $oCollection;
    }

    public function add(OrderItem $oOrderItem):void
    {
        $this->array[] = $oOrderItem;
    }

	/**
	 * @return OrderItem
	 */
    public function current(): IGenericDataType
    {
        return $this->array[$this->position];
    }
    public function toArray(): array
    {
        $aOut = [];
        foreach($this as $oOrderItem)
        {
            $aOut[] = $oOrderItem->toArray();
        }
        return $aOut;
    }
    public static function make(array $aOrderItemCollection):self
    {
        return self::createFromArray($aOrderItemCollection);
    }
    public static function createFromArray(array $aOrderItemCollection):self
    {
        $new = new self();
        foreach($aOrderItemCollection as $aOrderItem)
        {
            $new->add(OrderItem::createFromArray($aOrderItem));
        }
        return $new;
    }
}
