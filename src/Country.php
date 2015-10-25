<?php
/**
 * ISO Codes
 * 
 * @author Juan Pedro Gonzalez Gutierrez
 * @copyright Copyright (c) 2015 Juan Pedro Gonzalez Gutierrez
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

namespace IsoCodes\Country;

class Country implements CountryInterface
{
    protected $alpha2;
    protected $alpha3;
    protected $numeric;
    protected $name;
    protected $officialName;

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
     * Get alpha-3 code.
     * 
     * @return string|null
     */
    public function getAlpha3()
    {
        return $this->alpha3;
    }

    /**
     * Get country name.
     * 
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get numeric code.
     * 
     * @return int|null
     */
    public function getNumeric()
    {
        return $this->numeric;
    }

    /**
     * Get official country name.
     * 
     * @return string|null
     */
    public function getOfficialName()
    {
        return $this->officialName;
    }

    /**
     * Set alpha-2 code.
     * 
     * @param string $code Alpha-2 code
     * @return CountryInterface
     */
    public function setAlpha2($code)
    {
        $this->alpha2 = $code;
        return $this;
    }

    /**
     * Set alpha-3 code.
     * 
     * @param string $code Alpha-3 code
     * @return CountryInterface
     */
    public function setAlpha3($code)
    {
        $this->alpha3 = $code;
        return $this;
    }

    /**
     * Set country name.
     * 
     * @param string $name Country name
     * @return CountryInterface
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Set numeric code.
     * 
     * @param int $code Numeric code
     * @return CountryInterface
     */
    public function setNumeric($code)
    {
        if ($code !== null) {
            $this->numeric = (int)$code;
        } else {
            $this->numeric = null;
        }

        return $this;
    }

    /**
     * Set official country name.
     * 
     * @param string $name Official country name
     * @return CountryInterface
     */
    public function setOfficialName($name)
    {
        $this->officialName = $name;
        return $this;
    }
}