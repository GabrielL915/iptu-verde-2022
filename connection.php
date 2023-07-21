<?php

define( 'MYSQL_HOST', 'localhost' );
define( 'MYSQL_USER', 'root' );
define( 'MYSQL_PASSWORD', '' );
define( 'MYSQL_DB_NAME', 'iptuverde_2023');

try
{
    $pdo = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
    $pdo->exec("set names utf8mb4");
    return $pdo;
} catch ( PDOException $e){
    return $e;
}