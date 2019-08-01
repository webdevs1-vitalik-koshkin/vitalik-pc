<?php
    include 'config.php';

    try
    {
        $db = new PDO("mysql:host=$mysql_host;dbname=$mysql_database", $mysql_user, $mysql_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch (PDOException $e) {
        print "Error! Unable to connect to the database.<br> More details: ".$e ;
        die();
    }