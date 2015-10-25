<?php
/**
 * ISO Codes
 * 
 * @author Juan Pedro Gonzalez Gutierrez
 * @copyright Copyright (c) 2015 Juan Pedro Gonzalez Gutierrez
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

namespace IsoCodes\Country\Adapter;

interface AdapterInterface
{
    /**
     * Get all countries.
     * 
     * @return array
     */
    public function getAll();

    /**
     * Find a country by alpha-2 code.
     * 
     * @param string $code Alpha-2 code
     * @return \IsoCodes\Country\CountryInterface
     */
    public function findByAlpha2($code);

    /**
     * Find a country by alpha-3 code.
     * 
     * @param string $code Alpha-3 code
     * @return \IsoCodes\Country\CountryInterface
     */
    public function findByAlpha3($code);

    /**
     * Find a country by numeric code.
     * 
     * @param string $code Numeric code
     * @return \IsoCodes\Country\CountryInterface
     */
    public function findByNumeric($code);
}