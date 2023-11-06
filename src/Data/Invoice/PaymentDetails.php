<?php

namespace Hurah\Invoice\Data\Invoice;

use Hurah\Types\Type\Bic;
use Hurah\Types\Type\Iban;

/**
 *
 */
class PaymentDetails
{
	private Iban $ibanNumber;
	private Bic $bic;

	/**
	 * @return Iban
	 */
	public function getIbanNumber(): Iban
	{
		return $this->ibanNumber;
	}

	/**
	 * @param Iban $ibanNumber
	 */
	public function setIbanNumber(Iban $ibanNumber): void
	{
		$this->ibanNumber = $ibanNumber;
	}

	/**
	 * @return Bic
	 */
	public function getBic(): Bic
	{
		return $this->bic;
	}

	/**
	 * @param Bic $bic
	 */
	public function setBic(Bic $bic): void
	{
		$this->bic = $bic;
	}
	public static function make(Iban $ibanNumber, Bic $bic): PaymentDetails
	{
		$new  = new self();
		$new->setIbanNumber($ibanNumber);
		$new->setBic($bic);
		return $new;
	}
}
