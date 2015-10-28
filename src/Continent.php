<?php
/**
 * ISO Codes
 * 
 * @author Juan Pedro Gonzalez Gutierrez
 * @copyright Copyright (c) 2015 Juan Pedro Gonzalez Gutierrez
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

namespace IsoCodes\Country;

class Continent implements 
    ContinentInterface, 
    CountryManagerAwareInterface
{
    /**
     * @var string
     */
    protected $alpha2;

    /**
     * Country manager
     * 
     * @var CountryManager
     */
    protected $countryManager;

    /**
     * @var string
     */
    protected $name;

    public function __construct($alpha2, $name)
    {
        $this->alpha2 = $alpha2;
        $this->name   = $name;
    }

    /**
     * Get alpha-2 code.
     * 
     * @return string|null
     */
    public function getAlpha2()
    {
        return $this->alpha2;
    }

    /**
     * Get continent name.
     * 
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set alpha-2 code.
     * 
     * @param string $code Alpha-2 code
     * @return Continent
     */
    public function setAlpha2($code)
    {
        $this->alpha2 = $code;
        return $this;
    }

    /**
     * Set continent name.
     * 
     * @param string $name Continent name
     * @return Continent
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getCountries()
    {
        return $this->countryManager->getAll($this->alpha2);
    }

    public function getCountryNames()
    {
        return $this->countryManager->getNames($this->alpha2);
    }

    /**
     * Set country manager
     *
     * @param CountryManager $countryManager
     * @return Continent
     */
    public function setCountryManager(CountryManager $countryManager)
    {
        $this->countryManager = $countryManager;
        return $this;
    }
}