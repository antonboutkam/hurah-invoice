<?php
namespace Hurah\Invoice\Data\Invoice;

use Hurah\Invoice\Data\Invoice\Address;
use Hurah\Types\Type\AbstractCollectionDataType;

class AddressCollection extends AbstractCollectionDataType
{
    public static function create(...$oAddress):self
    {
        $oCollection = new AddressCollection();

        foreach($oAddress as $item)
        {
            $oCollection->add($item);
        }
        return $oCollection;
    }
    public function add(Address $oAddress):void
    {
        $this->array[] = $oAddress;
    }
    public function current(): Address
    {
        return $this->array[$this->position];
    }
	public function getDelivery():Address
	{
		return $this->getByType(AddressType::create(AddressType::DELIVERY));
	}
	public function getInvoice():Address
	{
		return $this->getByType(AddressType::create(AddressType::INVOICE));
	}
	public function getByType(AddressType $type):Address
	{
		foreach($this as $address)
		{
			if($address->getAddressType()->getType() === $type->getType())
			{
				return $address;
			}
		}
		return new Address();
	}
    public function toArray(): array
    {
        $aOut = [];
        foreach($this as $oAddress)
        {
            $aOut[] = $oAddress->toArray();
        }
        return $aOut;
    }
    public static function createFromArray(array $aArray):self
    {
        $new = new self();
        foreach($aArray as $aAddress)
        {
            $new->add(Address::createFromArray($aAddress));
        }
        return $new;
    }
}
