<?php
/**
 * ISO Codes
 * 
 * @author Juan Pedro Gonzalez Gutierrez
 * @copyright Copyright (c) 2015 Juan Pedro Gonzalez Gutierrez
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

namespace IsoCodes\Country;

interface CountryInterface
{
    /**
     * Get alpha-2 code.
     * 
     * @return string|null
     */
    public function getAlpha2();

    /**
     * Get alpha-3 code.
     * 
     * @return string|null
     */
    public function getAlpha3();

    /**
     * Get country name.
     * 
     * @return string|null
     */
    public function getName();

    /**
     * Get numeric code.
     * 
     * @return int|null
     */
    public function getNumeric();

    /**
     * Get official country name.
     * 
     * @return string|null
     */
    public function getOfficialName();

    /**
     * Set alpha-2 code.
     * 
     * @param string $code Alpha-2 code
     * @return CountryInterface
     */
    public function setAlpha2($code);

    /**
     * Set alpha-3 code.
     * 
     * @param string $code Alpha-3 code
     * @return CountryInterface
     */
    public function setAlpha3($code);

    /**
     * Set country name.
     * 
     * @param string $name Country name
     * @return CountryInterface
     */
    public function setName($name);

    /**
     * Set numeric code.
     * 
     * @param int $code Numeric code
     * @return CountryInterface
     */
    public function setNumeric($code);

    /**
     * Set official country name.
     * 
     * @param string $name Official country name
     * @return CountryInterface
     */
    public function setOfficialName($name);
}