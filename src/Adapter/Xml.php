<?php
/**
 * ISO Codes
 * 
 * @author Juan Pedro Gonzalez Gutierrez
 * @copyright Copyright (c) 2015 Juan Pedro Gonzalez Gutierrez
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

namespace IsoCodes\Country\Adapter;

use IsoCodes\Country\Country;

use XMLReader;

class Xml
{
    /**
     * @var XMLReader
     */
    protected $reader;

    protected $countries = array();
    
    public function __construct($filename)
    {
        $this->reader = new XMLReader();
        $this->reader->open($filename, null, LIBXML_XINCLUDE);

        $countries = $this->processNextElement();
        if (isset($countries['iso_3166_entries']['iso_3166_entry'])) {
            $countries = $countries['iso_3166_entries']['iso_3166_entry'];

            foreach ($countries as $countryArray) {
                $country = new Country();
                $country->setAlpha2(isset($countryArray['alpha_2_code']) ? $countryArray['alpha_2_code'] : null);
                $country->setAlpha3(isset($countryArray['alpha_3_code']) ? $countryArray['alpha_3_code'] : null);
                $country->setNumeric(isset($countryArray['numeric_code']) ? $countryArray['numeric_code'] : null);
                $country->setName(isset($countryArray['name']) ? $countryArray['name'] : null);
                $country->setOfficialName(isset($countryArray['official_name']) ? $countryArray['official_name'] : null);

                $this->countries[] = $country;
            }
        }
    }

    /**
     * Get all countries.
     * 
     * @return array
     */
    public function getAll()
    {
        return $this->countries;
    }

    /**
     * Find a country by alpha-2 code.
     * 
     * @param string $code Alpha-2 code
     * @return \IsoCodes\Country\CountryInterface
     */
    public function findByAlpha2($code)
    {
        foreach ($this->countries as $country) {
            if ($country->getAlpha2() === $code) {
                return $country;
            }
        }
    }

    /**
     * Find a country by alpha-3 code.
     * 
     * @param string $code Alpha-3 code
     * @return \IsoCodes\Country\CountryInterface
     */
    public function findByAlpha3($code)
    {
        foreach ($this->countries as $country) {
            if ($country->getAlpha3() === $code) {
                return $country;
            }
        }
    }

    /**
     * Find a country by numeric code.
     * 
     * @param string $code Numeric code
     * @return \IsoCodes\Country\CountryInterface
     */
    public function findByNumeric($code)
    {
        foreach ($this->countries as $country) {
            if ($country->getNumeric() === $code) {
                return $country;
            }
        }
    }
    
    /**
     * Process the next inner element.
     *
     * @return mixed
     */
    protected function processNextElement()
    {
        $children = array();
        $text     = '';

        while ($this->reader->read()) {
            if ($this->reader->nodeType === XMLReader::ELEMENT) {
                $name = $this->reader->name;

                // Get attributes
                $attributes = array();

                if ($this->reader->hasAttributes) {
                    while ($this->reader->moveToNextAttribute()) {
                        $attributes[$this->reader->localName] = $this->reader->value;
                    }

                    $this->reader->moveToElement();
                }
                
                if ($this->reader->isEmptyElement) {
                    $child = array();
                } else {
                    $child = $this->processNextElement();
                }

                if ($attributes) {
                    if (!is_array($child)) {
                        $child = array();
                    }

                    $child = array_merge($child, $attributes);
                }
                
                if (isset($children[$name])) {
                    if (!is_array($children[$name]) || !array_key_exists(0, $children[$name])) {
                        $children[$name] = array($children[$name]);
                    }

                    $children[$name][] = $child;
                } else {
                    $children[$name] = $child;
                }
            } elseif ($this->reader->nodeType === XMLReader::END_ELEMENT) {
                break;
            }
        }

        return $children ?: $text;
    }
}