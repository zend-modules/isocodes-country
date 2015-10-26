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

class Pdo implements AdapterInterface
{
    /**
     * @var \PDO
     */
    protected $connection;

    /**
     * Constructor.
     * 
     * You can pass a \PDO object or the constructor params for the
     * \PDO object. The example array:
     * 
     *     array(
     *        'dsn'      => 'DSN',  // required
     *        'username' => null,   // optional
     *        'password' => null,   // optional
     *        'options'  => null    // optional
     *     );
     *     
     * @param \PDO|array $options
     */
    public function __construct($options)
    {
        if (is_array($options)) {
            if (!isset($options['dsn'])) {
            }

            if (!isset($options['username'])) {
                $options['username'] = null;
            }

            if (!isset($options['password'])) {
                $options['password'] = null;
            }

            if (!isset($options['options'])) {
                $options['options'] = null;
            }

            $this->connection = new \PDO($options['dsn'], $options['username'], $options['password'], $options['options']);
        } elseif( $options instanceof \PDO) {
            $this->connection = $options;
        }
    }

    /**
     * Get all countries.
     * 
     * @return array
     */
    public function getAll()
    {
        $statement = $this->connection->prepare("SELECT * FROM iso_3166_1");
        $result    = $statement->execute();
        if (!$result) {
            return array();
        }

        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $results;
    }

    /**
     * Get all country names.
     * 
     * @return array Retuns an array of aplha2 to name array.
     */
    public function getNames()
    {
        $retValues = array();
        
        $statement = $this->connection->prepare("SELECT alpha_2, name FROM iso_3166_1");
        $result    = $statement->execute();
        if (!$result) {
            return array();
        }

        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            $retValues[$result['alpha_2']] = $result['name'];
        }

        return $retValues;
    }

    /**
     * Find a country by alpha-2 code.
     * 
     * @param string $code Alpha-2 code
     * @return \IsoCodes\Country\CountryInterface|null
     */
    public function findByAlpha2($code)
    {        
        $statement = $this->connection->prepare("SELECT * FROM iso_3166_1 WHERE alpha2 = ?");
        $result    = $statement->execute( array($code) );
        if (!$result) {
            return null;
        }

        $result = $statement->fetch(\PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * Find a country by alpha-3 code.
     * 
     * @param string $code Alpha-3 code
     * @return \IsoCodes\Country\CountryInterface|null
     */
    public function findByAlpha3($code)
    {
        $statement = $this->connection->prepare("SELECT * FROM iso_3166_1 WHERE alpha3 = ?");
        $result    = $statement->execute( array($code) );
        if (!$result) {
            return null;
        }

        $result = $statement->fetch(\PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * Find a country by numeric code.
     * 
     * @param string $code Numeric code
     * @return \IsoCodes\Country\CountryInterface|null
     */
    public function findByNumeric($code)
    {
        $statement = $this->connection->prepare("SELECT * FROM iso_3166_1 WHERE numeric = ?");
        $result    = $statement->execute( array($code) );
        if (!$result) {
            return null;
        }

        $result = $statement->fetch(\PDO::FETCH_ASSOC);

        return $result;
    }
}