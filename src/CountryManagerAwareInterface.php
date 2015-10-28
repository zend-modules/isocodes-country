<?php
/**
 * ISO Codes
 * 
 * @author Juan Pedro Gonzalez Gutierrez
 * @copyright Copyright (c) 2015 Juan Pedro Gonzalez Gutierrez
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

namespace IsoCodes\Country;

interface CountryManagerAwareInterface
{
    /**
     * Set country manager
     *
     * @param ServiceManager $serviceManager
     */
    public function setCountryManager(CountryManager $countryManager);
}