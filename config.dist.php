<?php
/**
 * copy this file to config.php
 * customize this config file to your projects needs 
 * 
 * just be aware that you initialize Indechse_Database with your 
 * database credentials at the end
 */

$toolConfig['database'] = array(
    'driver' => 'db-driver',
    'user' => 'dbuser',
    'password' => 'dbpassword',
    'host' => 'localhost',
    'database' => 'database_name'
);

Indechse_Database::getInstance()->createConnection(
        $toolConfig['database']['driver'], 
        $toolConfig['database']['host'], 
        $toolConfig['database']['database'], 
        $toolConfig['database']['user'], 
        $toolConfig['database']['password']
    );  