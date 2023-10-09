<?php

namespace Data;


use Hurah\Invoice\Data\Invoice;
use Hurah\Types\Exception\MethodNotImplementedException;
use Hurah\Types\Type\DnsName;
use Test\Hurah\Invoice\AbstractTestCase;

class EnvironmentTest extends AbstractTestCase
{

    public function testMagicMethod()
    {
        $extra = [
            'logo' => 'invoice-logo.png'
        ];
        $oEnv = Invoice\Environment::init(
            'static.antonboutkam.nl',
            'antonboutkam.nl',
            $extra);

        $this->assertEquals('invoice-logo.png', $oEnv->getLogo());
        $this->expectException(MethodNotImplementedException::class);
        $this->assertEquals('invoice-logo.png', $oEnv->getLogoWhatever());

        $this->assertEquals($oEnv->getAssetsHostname(), new DnsName('static.antonboutkam.nl'));

    }

}
