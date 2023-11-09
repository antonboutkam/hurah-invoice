<?php

namespace Data;

use Hurah\Invoice\Data\Invoice;
use Test\Hurah\Invoice\AbstractTestCase;

class TotalsTest extends AbstractTestCase
{

    public function testConstructValues()
    {
		$oInvoice = $this->structure->getInvoice();
		$oTotals =  $oInvoice->getTotals();

		$fExpected = $oTotals->getTotalsIncVat();
		$fVatExVat = $oTotals->getTotalsVat() + $oTotals->getTotalsExVat();
		$this->assertEquals($fExpected, $fVatExVat);

		foreach ($oTotals->getVatCollection() as $item)
		{
			$fVatDueExpected = (($item->getVatOn() / 100) * $item->getPercentage());
			$this->assertEquals($fVatDueExpected, $item->getVatDue());			;
		}
    }

}
