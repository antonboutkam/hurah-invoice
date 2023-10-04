<?php
namespace Hurah\Invoice\Data\Invoice\Order;

use Hurah\Invoice\Data\Invoice\Order\OrderItem;
use Hurah\Types\Type\AbstractCollectionDataType;

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
    public function current(): OrderItem
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