<?php
/**
 * ISO Codes
 * 
 * @author Juan Pedro Gonzalez Gutierrez
 * @copyright Copyright (c) 2015 Juan Pedro Gonzalez Gutierrez
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

namespace IsoCodes\Country;

class ContinentManager
{
    /**
     * Continent list.
     * 
     * @var array
     */
    protected $continents = array();

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->continents = array(
            'AF' => 'Africa',
            'AN' => 'Antarctica',
            'AS' => 'Asia',
            'EU' => 'Europe',
            'NA' => 'North america',
            'OC' => 'Oceania', 
            'SA' => 'South america'
        );
    }

    /**
     * Get the continent name.
     * 
     * @param string $code Continent code.
     */
    public function get($code)
    {
        if (array_key_exists($code, $this->continents)) {
            return $this->continents[$code];
        }

        return null;
    }

    /**
     * Get the continent code.
     * 
     * @param string $name Continent name.
     */
    public function getCode($name)
    {
        foreach ($this->continents as $key => $value) {
            if (strcasecmp($name, $value) === 0) {
                return $key;
            }
        }

        return null;
    }
    
}