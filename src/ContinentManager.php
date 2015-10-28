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

class ContinentManager implements TranslatorAwareInterface
{
    /**
     * Continent list.
     * 
     * @var array
     */
    protected $continents = array();

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
            'AF' => 'Africa',
            'AN' => 'Antarctica',
            'AS' => 'Asia',
            'EU' => 'Europe',
            'NA' => 'North america',
            'OC' => 'Oceania', 
            'SA' => 'South america'
        );

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
                $retItems[$key] = $this->translator->translate($value, $this->translatorTextDomain);
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
                return $this->translator->translate($this->continents['code'], $this->translatorTextDomain);
            } else {
                return $this->continents[$code];
            }
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

    /**
     * Get all continents names.
     * 
     * @return array Retuns an array of aplha2 to name array.
     */
    public function getNames()
    {
        if (array_key_exists($code, $this->continents)) {
            if ($this->isTranslatorEnabled()) {
                return $this->translator->translate($this->continents['code'], $this->translatorTextDomain);
            } else {
                return $this->continents[$code];
            }
        }

        return null;
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
}