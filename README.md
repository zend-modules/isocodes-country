# isocodes-country #
[![Build Status](https://secure.travis-ci.org/zend-modules/isocodes-country.svg?branch=master)](https://secure.travis-ci.org/zend-modules/isocodes-country)

## Installation ##

1. Add this project in your composer.json:

    ```json
    "require": {
        "zend-modules/isocodes-country": "dev-master"
    }
    ```

2. Now tell composer to download `isocodes-country` by running the command:

    ```bash
    $ php composer.phar update
    ```

## Adapters ##
### StaticAdapter ###
The static adapter uses an internal array of country names. This is the default adapter as no extra configuration in needed.

    $countryManager = new \IsoCodes\Country\Country();

### Pdo ###
This adapter uses a PDO connection to fetch the data from a database. You have a MySQL dump of the database table in `data\iso_3166.sql`

    $dbh = new \Pdo('mysql:host:localhost;dbname=isodata;', 'root', '');
    $adapter = new \IsoCodes\Country\Adapter\Pdo($dbh);
    $countryManager = new \IsoCodes\Country\Country($adapter);

You may also pass the `PDO::__construct` parameters.

    $adapter = new \IsoCodes\Country\Adapter\Pdo(array(
        'dsn'      => 'mysql:host:localhost;dbname=isodata;',
        'username' => 'root',
        'password' => ''
    ));
    $countryManager = new \IsoCodes\Country\Country($adapter);

### ZendDB ###
This adapter uses a `Zend\Db\Adapter\Adapterinterface` object to retrieve country information from a database.

As an example:

    $dbAdapter      = $serviceManager->get('Zend\Db\Adapter\Adapter');
    $adapter        = new \IsoCodes\Country\Adapter\ZendDB($dbAdapter);
    $countryManager = new \IsoCodes\Country\Country($adapter);

## Translating ##
The default output is english.

To change the output locale set the translator's locale to the one that fits your needs. For example, if you wish to output the country names in spanish:

    $countryManager->getTranslator()->setLocale('es');

## Data Source ##
The data provided by this module comes from iso-codes package from Debian.

[http://pkg-isocodes.alioth.debian.org/](http://pkg-isocodes.alioth.debian.org/)
