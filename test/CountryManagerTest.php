<?php
namespace IsoCodesTest\Country;

use PHPUnit_Framework_TestCase as TestCase;
use IsoCodes\Country\CountryManager;

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
}