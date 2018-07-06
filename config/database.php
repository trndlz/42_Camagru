<?php
class dbConfig
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:dbname=camagru;host=localhost', 'root', 'pokpokpok');
        return $db;
    }
}
?>
