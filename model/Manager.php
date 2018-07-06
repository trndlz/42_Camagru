<?php

class Manager
{
	require_once('config/database.php');

    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
        return $db;
    }
}
