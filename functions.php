<?php
function connect($config){
    try{
        $conn = new PDO(
                'mysql:host=localhost;dbname=project',
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

function get($tableName, $conn){
    try{
        $result = $conn->query("SELECT * FROM $tableName");
        return ($result->rowCount() > 0)? $result : false;
    }catch(Exception $e){
        echo 'error hai :'. $e.getMessage();
        return false;
    }
}

function query($query, $bindings, $conn){
    $stmt = $conn->prepare($query);
    $stmt->execute($bindings);
    $results = $stmt->fetchAll();
    ($results)? $results : false;
}

