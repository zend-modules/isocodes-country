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
     * Get all country names.
     * 
     * @return array Retuns an array of aplha2 to name array.
     */
    public function getNames();

    /**
     * Find a country by alpha-2 code.
     * 
     * @param string $code Alpha-2 code
     * @return \IsoCodes\Country\CountryInterface|null
     */
    public function findByAlpha2($code);

    /**
     * Find a country by alpha-3 code.
     * 
     * @param string $code Alpha-3 code
     * @return \IsoCodes\Country\CountryInterface|null
     */
    public function findByAlpha3($code);

    /**
     * Find a country by numeric code.
     * 
     * @param string $code Numeric code
     * @return \IsoCodes\Country\CountryInterface|null
     */
    public function findByNumeric($code);
}