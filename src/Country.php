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
    protected $continent;
    protected $name;
    protected $officialName;

    public function __construct($data = array())
    {
        if (is_array($data)) {
            // TODO: Sanity checks

            $this->alpha2       = isset($data['alpha_2']) ? $data['alpha_2'] : null;
            $this->alpha3       = isset($data['alpha_3']) ? $data['alpha_3'] : null;
            $this->numeric      = isset($data['numeric']) ? $data['numeric'] : null;
            $this->name         = isset($data['name']) ? $data['name'] : null;
            $this->officialName = isset($data['official_name']) ? $data['official_name'] : null;

            if (isset($data['continent_alpha_2'])) {
                $continentManager = new ContinentManager();
                $this->continent  = $continentManager->get($data['continent_alpha_2']);
            }
        } elseif ($data instanceof Country) {
            $this->alpha2       = $data->getAlpha2();
            $this->alpha3       = $data->getAlpha3();
            $this->numeric      = $data->getNumeric();
            $this->name         = $data->getName();
            $this->officialName = $data->getOfficialName();
            $this->continent    = $data->getContinent();
        }
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
     * Get alpha-3 code.
     * 
     * @return string|null
     */
    public function getAlpha3()
    {
        return $this->alpha3;
    }

    /**
     * Get the continent.
     * 
     * Enter description here ...
     */
    public function getContinent()
    {
        return $this->continent;
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