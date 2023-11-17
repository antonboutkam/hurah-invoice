<?php
namespace Hurah\Invoice\Data\Invoice;

use Hurah\Invoice\Data\Invoice\Totals\Discount;
use Hurah\Invoice\Data\Invoice\Totals\DiscountCollection;
use Hurah\Invoice\Data\Invoice\Totals\VatAmount;
use Hurah\Invoice\Data\Invoice\Totals\VatCollection;

final class Totals
{

	private float $totalsExVat;
	private float $totalsIncVat;
	private float $totalsVat;
	private DiscountCollection $discountCollection;
	private VatCollection $vatCollection;

	/**
	 * Constructor
	 * @generate [properties, getters, setters]
	 */
	public function __construct()
	{
		$this->vatCollection = new VatCollection();
		$this->discountCollection = new DiscountCollection();
	}

	public static final function create(float $totalsIncVat, float $totalsExVat, float $totalsVat, VatCollection $vatCollection): self
	{
		$new = new self();
		$new->setTotalsIncVat($totalsIncVat);
		$new->setTotalsExVat($totalsExVat);
		$new->setTotalsVat($totalsVat);
		$new->setVatCollection($vatCollection);
		return $new;
	}

	/**
	 * @return array
	 */
	public final function toArray(): array
	{
		return [
			'totalsExVat' => $this->getTotalsExVat(),
			'totalsIncVat' => $this->getTotalsIncVat(),
			'totalsVat' => $this->getTotalsVat(),
			'vatCollection' => $this->getVatCollection(),
			'discountCollection' => $this->getDiscountCollection()
		];
	}

	/**
	 * @param array $aData
	 *
	 * @return self
	 */
	public static final function fromArray(array $aData = []): self
	{
		$new = new self();
		if(isset($aData['totalsExVat']))
		{
			$new->setTotalsExVat($aData['totalsExVat']);
		}
		if(isset($aData['totalsIncVat']))
		{
			$new->setTotalsIncVat($aData['totalsIncVat']);
		}
		if(isset($aData['totalsVat']))
		{
			$new->setTotalsVat($aData['totalsVat']);
		}
		if(isset($aData['vatCollection']))
		{
			$new->setVatCollection($aData['vatCollection']);
		}
		if(isset($aData['discountCollection']))
		{
			$new->setDiscountCollection($aData['discountCollection']);
		}
		return $new;
	}

	/**
	 * @return VatCollection
	 */
	public function getVatCollection():VatCollection
	{
		return $this->vatCollection;
	}

	/**
	 * @param VatCollection $vatCollection
	 *
	 * @return $this
	 */
	public function setVatCollection(VatCollection $vatCollection):self
	{
		$this->vatCollection = $vatCollection;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getTotalsExVat(): float
	{
		return $this->totalsExVat;
	}

	/**
	 * @param float $totalsExVat
	 *
	 * @return Totals
	 */
	public function setTotalsExVat(float $totalsExVat): Totals
	{
		$this->totalsExVat = $totalsExVat;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getTotalsIncVat(): float
	{
		return $this->totalsIncVat;
	}

	/**
	 * @param float $totalsIncVat
	 *
	 * @return Totals
	 */
	public function setTotalsIncVat(float $totalsIncVat): Totals
	{
		$this->totalsIncVat = $totalsIncVat;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getTotalsVat(): float
	{
		return $this->totalsVat;
	}

	/**
	 * @param float $totalsVat
	 *
	 * @return Totals
	 */
	public function setTotalsVat(float $totalsVat): Totals
	{
		$this->totalsVat = $totalsVat;
		return $this;
	}
	public function addDiscountLine(Discount $discount)
	{
		$this->discountCollection->add($discount);
	}
	public function addVatLine(VatAmount $vat)
	{
		$this->vatCollection->add($vat);
	}
	public function getVat():float
	{
		$aSum = [];
		foreach ($this->vatCollection as $vat)
		{
			$aSum[] = $vat->getValue();
		}
		return array_sum($aSum);
	}

	/**
	 * @return DiscountCollection
	 */
	public function getDiscountCollection(): DiscountCollection
	{
		return $this->discountCollection;
	}

	/**
	 * @param DiscountCollection $discountCollection
	 *
	 * @return Totals
	 */
	public function setDiscountCollection(DiscountCollection $discountCollection): Totals
	{
		$this->discountCollection = $discountCollection;
		return $this;
	}
}
