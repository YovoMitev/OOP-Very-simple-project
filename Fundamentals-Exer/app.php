<?php
session_start();
spl_autoload_register(function($class) {
    require_once $class . '.php';
});


$dbInfo = "mysql:host=".\Config\DBConfig::DB_HOST . ";dbname=" . \Config\DBConfig::DB_NAME . ";charset=utf8";
$db = new PDO($dbInfo, \Config\DBConfig::DB_USER, \Config\DBConfig::DB_PASS);


