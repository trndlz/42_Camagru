<?php
class dbConfig
{
    protected function dbConnect()
    {
        try {
            $db = new PDO('mysql:dbname=camagru;host=localhost', 'root', '123456');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }
    }
}
?>
