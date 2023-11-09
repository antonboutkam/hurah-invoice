<?php

namespace Test\Hurah\Invoice\Generator;

use Hurah\Invoice\Generator\HtmlInvoice;
use Hurah\Types\Type\Path;
use PHPUnit\Framework\TestCase;
use Test\Hurah\Invoice\AbstractTestCase;
use Test\Hurah\Types\Type\Helper\AbstractTest;

class HtmlInvoiceTest extends AbstractTestCase
{

	public function testRender() {

		for($i = 1; $i < 3; $i++)
		{
			$testInvoice = Path::make(__DIR__)->dirname(1)->extend('Layout', "test.{$i}.invoice.twig");

			$this->structure->getEnvironment()->setTranslations(['hallo' => ' world', 'huh' => ' hallo']);
			$this->structure->getEnvironment()->enableDebugging();
			$oInvoiceTest = new HtmlInvoice($this->structure, $testInvoice->contents());
			$sHtml = (string) $oInvoiceTest->render();

			if($i === 1)
			{
				$this->assertEquals('<html>mamma hallo</html>', $sHtml);
			}
			else
			{
				$this->assertEquals('<html>hallo world</html>', $sHtml);
			}

		}


	}

	public function test__construct() {}
}
