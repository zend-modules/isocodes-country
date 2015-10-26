<?php
/**
 * ISO Codes
 * 
 * @author Juan Pedro Gonzalez Gutierrez
 * @copyright Copyright (c) 2015 Juan Pedro Gonzalez Gutierrez
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */
namespace IsoCodes\Country\Adapter;

use Zend\Db\Adapter\AdapterInterface as DBAdapterInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql;

class ZendDB implements AdapterInterface
{
    /**
     * @var DBAdapterInterface
     */
    protected $adapter;

    /**
     * constructor.
     * 
     * @param DBAdapterInterface $adapter
     */
    public function __construct(DBAdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * Get all countries.
     * 
     * @return array
     */
    public function getAll()
    {
        $sql       = new Sql($this->adapter);
        $select    = $sql->select('iso_3166_1');
        $statement = $sql->prepareStatementForSqlObject($select);
        $result    = $statement->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            $resultSet = new ResultSet();
            $resultSet->initialize($result);

            return $resultSet->toArray();
        }

        return array();
    }

    /**
     * Get all country names.
     * 
     * @return array Retuns an array of aplha2 to name array.
     */
    public function getNames()
    {
        $sql       = new Sql($this->adapter);
        $select    = $sql->select('iso_3166_1');

        $select->columns('alpha_2', 'name');

        $statement = $sql->prepareStatementForSqlObject($select);
        $result    = $statement->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            $retValues = array();
            $resultSet = new ResultSet();
            $resultSet->initialize($result);

            foreach ($resultSet as $result) {
                $retValues[$result['alpha_2']] = $result['name'];
            }

            return $retValues;
        }

        return array();
    }

    /**
     * Find a country by alpha-2 code.
     * 
     * @param string $code Alpha-2 code
     * @return \IsoCodes\Country\CountryInterface|null
     */
    public function findByAlpha2($code)
    {
        $sql       = new Sql($this->adapter);
        $select    = $sql->select('iso_3166_1');

        $select->where(array('alpha_2' => $code));

        $statement = $sql->prepareStatementForSqlObject($select);
        $result    = $statement->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            return $result->current();
        }

        return null;
    }

    /**
     * Find a country by alpha-3 code.
     * 
     * @param string $code Alpha-3 code
     * @return \IsoCodes\Country\CountryInterface|null
     */
    public function findByAlpha3($code)
    {
        $sql       = new Sql($this->adapter);
        $select    = $sql->select('iso_3166_1');

        $select->where(array('alpha_3' => $code));

        $statement = $sql->prepareStatementForSqlObject($select);
        $result    = $statement->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            return $result->current();
        }

        return null;
    }

    /**
     * Find a country by numeric code.
     * 
     * @param string $code Numeric code
     * @return \IsoCodes\Country\CountryInterface|null
     */
    public function findByNumeric($code)
    {
        $sql       = new Sql($this->adapter);
        $select    = $sql->select('iso_3166_1');

        $select->where(array('numeric' => $code));

        $statement = $sql->prepareStatementForSqlObject($select);
        $result    = $statement->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            return $result->current();
        }

        return null;
    }
}