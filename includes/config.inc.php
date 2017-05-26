<?php
/**
 * Created by PhpStorm.
 * User: toki
 * Date: 26/05/17
 * Time: 17.55
 */
global $config;
//PDO config information
$config['dsn'] = 'mysql:host=localhost;
                        dbname=hair-future';
$config['username'] = 'root';
$config['password'] = '';
$config['options'] = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
?>