<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * $db['config']['database'] enable/disable module database, set value true/false.
 * $db['config']['multiple'] for multiple database, set value true/false.
 * 
 * if your use multiple database connection, use parent::database('another'); for
 * call another connection. or set parent::database() for default connection.
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
$db['config']['database'] = true;
$db['config']['multiple'] = false;

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * All of database config
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
$db['default']['dbhost'] = 'localhost';
$db['default']['dbuser'] = 'bluenexia';
$db['default']['dbpassword'] = 'bluenexia2016!';
$db['default']['dbdatabase'] = 'bluenexia_db';
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbdebug'] = true;
$db['default']['dbpersistant'] = false;
$db['default']['dbcharset'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *]
 * if you will create multiple connection. 
 * you must set another config, see example.
 * 
 *$db['another']['dbhost'] = '';
 *$db['another']['dbuser'] = '';
 *$db['another']['dbpassword'] = '';
 *$db['another']['dbdatabase'] = '';
 *$db['another']['dbdriver'] = 'mysql';
 *$db['another']['dbdebug'] = true;
 *$db['another']['dbpersistant'] = true;
 *$db['another']['dbcharset'] = 'utf8';
 *$db['another']['dbcollat'] = 'utf8_general_ci';
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
