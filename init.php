<?php

spl_autoload_register(function ($class) {
  include 'classes/' . $class . '.php';
});

function getDB(){
    $host = '127.0.0.1';
    $db   = 'crypto_manager';
    $user = 'hjhj007';
    $pass = 'password';

    $dsn = "mysql:host=$host;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass);

    return $pdo;
}

 ?>