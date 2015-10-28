<?php
/**
 * ISO Codes
 * 
 * @author Juan Pedro Gonzalez Gutierrez
 * @copyright Copyright (c) 2015 Juan Pedro Gonzalez Gutierrez
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

namespace IsoCodes\Country;

use IsoCodes\Country\Adapter\AdapterInterface;
use IsoCodes\Country\Adapter\StaticAdapter;
use Zend\I18n\Translator\Translator;
use Zend\I18n\Translator\TranslatorAwareInterface;
use Zend\I18n\Translator\TranslatorInterface;

class CountryManager implements TranslatorAwareInterface
{
    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * Translator used for country names.
     *
     * @var TranslatorInterface
     */
    protected $translator;

    /**
     * Whether the translator is enabled.
     *
     * @var bool
     */
    protected $translatorEnabled = true;

    /**
     * Translator text domain to use.
     *
     * @var string
     */
    protected $translatorTextDomain = 'country';

    public function __construct(AdapterInterface $adapter = null)
    {
        if (null === $adapter) {
            $adapter = new StaticAdapter();
        }

        $this->adapter = $adapter;

        // Translator
        $this->translator = new Translator();
        $this->translator->setLocale('en_US');
        $this->translator->setFallbackLocale('en_US');
        $this->translator->addTranslationFilePattern('gettext', dirname(__DIR__) . '/language/country/', '%s.mo', $this->translatorTextDomain);
    }

    /**
     * Get the countries adater.
     * 
     * @return AdapterInterface|null
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * Set the countries adapter.
     * 
     * @param AdapterInterface $adapter
     * @return CountryManager
     */
    public function setAdapter(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
        return $this;
    }

    /**
     * Get all countries.
     * 
     * @return array
     */
    public function getAll()
    {
        $countries = $this->adapter->getAll();

        $results = array();
        
        foreach ($countries as $country) {
            $country = new Country($country);
            if ($this->isTranslatorEnabled()) {
                $results[] = $this->translateCountry($country);
            } else {
                $results[] = $country;
            }
        }

        return $results;
    }

    /**
     * Get all country names.
     * 
     * @return array Retuns an array of aplha2 to name array.
     */
    public function getNames()
    {
        $countries = $this->adapter->getAll();

        $results = array();
        
        foreach ($countries as $country) {
            if ($this->isTranslatorEnabled()) {
                if (!empty($country['name'])) {
                    $country['name'] = $this->translator->translate($country['name'], $this->translatorTextDomain);
                }
            }

            $results[$country['alpha_2']] = $country['name'];
        }

        return $results;
    }

    /**
     * Find a country by alpha-2 code.
     * 
     * @param string $code Alpha-2 code
     * @return CountryInterface
     */
    public function findByAlpha2($code)
    {
        $country = $this->adapter->findByAlpha2($code);
        $country = new Country($country);
        if ($this->isTranslatorEnabled()) {
            $country = $this->translateCountry($country);
        }

        return $country;
    }

    /**
     * Find a country by alpha-3 code.
     * 
     * @param string $code Alpha-3 code
     * @return CountryInterface
     */
    public function findByAlpha3($code)
    {
        $country = $this->adapter->findByAlpha3($code);
        $country = new Country($country);
        if ($this->isTranslatorEnabled()) {
            $country = $this->translateCountry($country);
        }

        return $country;
    }

    /**
     * Find a country by numeric code.
     * 
     * @param string $code Numeric code
     * @return CountryInterface
     */
    public function findByNumeric($code)
    {
        $country = $this->adapter->findByNumeric($code);
        $country = new Country($country);
        if ($this->isTranslatorEnabled()) {
            $country = $this->translateCountry($country);
        }

        return $country;
    }

    /**
     * Translate the country names.
     * 
     * @param CountryInterface $country
     * @return CountryInterface
     */
    protected function translateCountry(CountryInterface $country)
    {
        if ($this->isTranslatorEnabled()) {
            $name = $country->getName();
            if (!empty($name)) {
                $country->setName($this->translator->translate($name, $this->translatorTextDomain));
            }

            $name = $country->getOfficialName();
            if (!empty($name)) {
                $country->setOfficialName($this->translator->translate($name, $this->translatorTextDomain));
            }
        }

        return $country;
    }

    /**
     * Sets translator to use in helper
     *
     * @param  TranslatorInterface $translator  [optional] translator.
     *                                           Default is null, which sets no translator.
     * @param  string              $textDomain  [optional] text domain
     *                                           Default is null, which skips setTranslatorTextDomain
     * @return CountryManager
     */
    public function setTranslator(TranslatorInterface $translator = null, $textDomain = null)
    {
        $this->translator = $translator;

        if ($textDomain !== null) {
            $this->setTranslatorTextDomain($textDomain);
        }

        return $this;
    }

    /**
     * Returns translator used in object
     *
     * @return TranslatorInterface|null
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * Checks if the object has a translator
     *
     * @return bool
     */
    public function hasTranslator()
    {
        return $this->translator !== null;
    }

    /**
     * Sets whether translator is enabled and should be used
     *
     * @param  bool $enabled [optional] whether translator should be used.
     *                       Default is true.
     * @return CountryManager
     */
    public function setTranslatorEnabled($enabled = true)
    {
        $this->translatorEnabled = $enabled;
        return $this;
    }

    /**
     * Returns whether translator is enabled and should be used
     *
     * @return bool
     */
    public function isTranslatorEnabled()
    {
        if ($this->hasTranslator()) {
            return $this->translatorEnabled;
        }

        return false;
    }

    /**
     * Set translation text domain
     *
     * @param  string $textDomain
     * @return CountryManager
     */
    public function setTranslatorTextDomain($textDomain = 'country')
    {
        $this->translatorTextDomain = $textDomain;
        return $this;
    }

    /**
     * Return the translation text domain
     *
     * @return string
     */
    public function getTranslatorTextDomain()
    {
        return $this->translatorTextDomain;
    }
}