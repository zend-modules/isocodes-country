<?php
namespace IsoCodesTest\Country;

use PHPUnit_Framework_TestCase as TestCase;
use IsoCodes\Country\CountryManager;
use IsoCodes\Country\Adapter\Xml;

class CountryManagerTest extends TestCase
{
    /**
     * @var CountryManager
     */
    protected $countryManager;

    public function setup()
    {
        $this->countryManager = new CountryManager();
    }

    /**
     * @covers IsoCodes\Country\CountryManager::__construct
     */
    public function testConstructorAdapter()
    {
        $adapter = new Xml(dirname(__DIR__) . '/data/iso_3166.xml');
        $this->assertInstanceOf('IsoCodes\Country\Adapter\AdapterInterface', $adapter);
        
        $countryManager = new CountryManager($adapter);
        $this->assertInstanceOf('IsoCodes\Country\CountryManager', $countryManager);

        unset($adapter, $countryManager);
    }
}