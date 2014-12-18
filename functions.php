<?php
session_start();
// including the config file
define('SCRIPTBASE', $_SERVER['DOCUMENT_ROOT'] . '/Project/');
require SCRIPTBASE . 'private/config.php';

function dbInit(){
    // return the cached db refrence
    if(isset($GLOBALS['db']))
        return $GLOBALS['db'];
    //else initialise
    global $config;
    $db = connect($config);
    $GLOBALS['db'] = $db;
    return $db;
}

function connect($config){
    try{
        $conn = new PDO(
                'mysql:host='.$config['HOSTNAME'].
                ';dbname='.$config['DB_NAME'],
                $config['DB_USERNAME'],
                $config['DB_PASSWORD']
            );
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $conn;
    }catch(PDOException $e){
        echo 'ERROR: '. $e->getMessage();
        return false;
    }
}

// returns reference to the statement object
function dbQuery($query,$bindings){
    $db = dbInit();
    $q = $db->prepare($query);
    $q->execute($bindings);
    return $q;
}

// returns a single row in the form of associative array
function dbRow($query,$bindings){
    $q = dbQuery($query,$bindings);
    return $q->fetch(PDO::FETCH_ASSOC);
}

// return everything
function dbAllRows($query,$bindings){
    $q = dbQuery($query,$bindings);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

// Login functions
function login_redirect(){
}

