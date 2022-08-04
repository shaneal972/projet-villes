<?php

require_once 'config.php';

function connect($host, $user, $db, $password){
    
    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

        return new PDO($dsn, $user, $password, $options);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

return connect($host, $user, $db, $password);



?>