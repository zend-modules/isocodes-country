<?php
/**
 * ISO Codes
 * 
 * @author Juan Pedro Gonzalez Gutierrez
 * @copyright Copyright (c) 2015 Juan Pedro Gonzalez Gutierrez
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

namespace IsoCodes\Country;

use Zend\I18n\Translator\Translator;
use Zend\I18n\Translator\TranslatorAwareInterface;
use Zend\I18n\Translator\TranslatorInterface;

class ContinentManager implements
    CountryManagerAwareInterface, 
    TranslatorAwareInterface
{        
    /**
     * Continent list.
     * 
     * @var array
     */
    protected $continents = array();

    /**
     * Country manager.
     * 
     * @var CountryManager
     */
    protected $countryManager = null;

    /**
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
    protected $translatorTextDomain = 'continent';

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->continents = array(
            'AF' => new Continent('AF', 'Africa'),
            'AN' => new Continent('AN', 'Antarctica'),
            'AS' => new Continent('AS', 'Asia'),
            'EU' => new Continent('EU', 'Europe'),
            'NA' => new Continent('NA', 'North america'),
            'OC' => new Continent('OC', 'Oceania'), 
            'SA' => new Continent('SA', 'South america')
        );

        if (null !== $this->countryManager) {
            foreach ($this->continents as $continent) {
                if ($continent instanceof CountryManagerAwareInterface) {
                    $country->setCountryManager($countryManager);
                }
            }
        }

        // Translator
        $this->translator = new Translator();
        $this->translator->setLocale('en_US');
        $this->translator->setFallbackLocale('en_US');
        $this->translator->addTranslationFilePattern('gettext', dirname(__DIR__) . '/language/continent/', '%s.mo', $this->translatorTextDomain);
    }

    /**
     * Get all continent names.
     * 
     * @return array
     */
    public function getAll()
    {
        if ($this->isTranslatorEnabled()) {
            $retItems = array();
            foreach ($this->continents as $key => $value) {
                $name = $this->translator->translate($value->getName(), $this->translatorTextDomain);
                $continent = clone $value;
                $continent->setName($name);
                $retItems[$key] = $continent;
            }
            return $retItems;
        }
        return $this->continents;
    }

    /**
     * Get the continent name.
     * 
     * @param string $code Continent code.
     */
    public function get($code)
    {
        if (array_key_exists($code, $this->continents)) {
            if ($this->isTranslatorEnabled()) {
                $continent = clone $this->continents[$code];
                $name      = $this->translator->translate($continent->getName(), $this->translatorTextDomain);
                $continent->setName($name);
                return $continent;
            } else {
                return $this->continents[$code];
            }
        }

        return null;
    }

    /**
     * Get all continents names.
     * 
     * @return array Retuns an array of aplha2 to name array.
     */
    public function getNames()
    {
        $retItems = array();

        foreach ($this->continents as $key => $value) {
            if ($this->isTranslatorEnabled()) {
                $name = $this->translator->translate($value->getName(), $this->translatorTextDomain);
                $retItems[$key] = $name;
            } else {
                $retItems[$key] = $value->getName();
            }
        }

        return $retItems;
    }

    /**
     * Sets translator to use in helper
     *
     * @param  TranslatorInterface $translator  [optional] translator.
     *                                           Default is null, which sets no translator.
     * @param  string              $textDomain  [optional] text domain
     *                                           Default is null, which skips setTranslatorTextDomain
     * @return TranslatorAwareInterface
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
     * @return TranslatorAwareInterface
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
     * @return TranslatorAwareInterface
     */
    public function setTranslatorTextDomain($textDomain = 'continent')
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

    /**
     * Set country manager
     *
     * @param CountryManager $countryManager
     * @return ContinentManager
     */
    public function setCountryManager(CountryManager $countryManager)
    {
        $this->countryManager = $countryManager;

        foreach ($this->continents as $continent) {
            if ($continent instanceof CountryManagerAwareInterface) {
                $continent->setCountryManager($countryManager);
            }
        }

        return $this;
    }
}