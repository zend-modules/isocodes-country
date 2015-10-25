<?php
/**
 * ISO Codes
 * 
 * @author Juan Pedro Gonzalez Gutierrez
 * @copyright Copyright (c) 2015 Juan Pedro Gonzalez Gutierrez
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

namespace IsoCodes\Country;

use IsoCodes\Country\Adapter\Xml as XmlAdapter;
use IsoCodes\Country\Adapter\AdapterInterface;

class CountryManager
{
    /**
     * @var AdapterInterface
     */
    protected $adapter;

    public function __construct(AdapterInterface $adapter = null)
    {
        if (null === $adapter) {
            $adapter = new XmlAdapter(dirname(__DIR__) . '/data/iso_3166.xml');
        }

        $this->adapter = $adapter;
    }

    /**
     * Get all countries.
     * 
     * @return array
     */
    public function getAll()
    {
        $countries = clone($this->adapter->getAll());
        return $countries;
    }

    /**
     * Find a country by alpha-2 code.
     * 
     * @param string $code Alpha-2 code
     * @return CountryInterface
     */
    public function findByAlpha2($code)
    {
        $country = clone($this->adapter->findByAlpha2($code));
        return $country;
    }

    /**
     * Find a country by alpha-3 code.
     * 
     * @param string $code Alpha-3 code
     * @return CountryInterface
     */
    public function findByAlpha3($code)
    {
        $country = clone($this->adapter->findByAlpha3($code));
        return $country;
    }

    /**
     * Find a country by numeric code.
     * 
     * @param string $code Numeric code
     * @return CountryInterface
     */
    public function findByNumeric($code)
    {
        $country = clone($this->adapter->findByNumeric($code));
        return $country;
    }
}