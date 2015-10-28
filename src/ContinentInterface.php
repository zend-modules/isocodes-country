<?php
/**
 * ISO Codes
 * 
 * @author Juan Pedro Gonzalez Gutierrez
 * @copyright Copyright (c) 2015 Juan Pedro Gonzalez Gutierrez
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

namespace IsoCodes\Country;

interface ContinentInterface
{
    /**
     * Get alpha-2 code.
     * 
     * @return string|null
     */
    public function getAlpha2();

    /**
     * Get continent name.
     * 
     * @return string|null
     */
    public function getName();

    /**
     * Set alpha-2 code.
     * 
     * @param string $code Alpha-2 code
     * @return ContinentsInterface
     */
    public function setAlpha2($code);

    /**
     * Set country name.
     * 
     * @param string $name Continent name
     * @return ContinentInterface
     */
    public function setName($name);

}