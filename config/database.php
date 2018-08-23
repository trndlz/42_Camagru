<?php
class dbConfig
{
    function __construct() {
        include("config.php");
        $this->DB_DSN = $DB_DSN;
        $this->DB_USER = $DB_USER;
        $this->DB_PASSWORD = $DB_PASSWORD;
    }

    protected function dbConnect()
    {
        
        try {
            $db = new PDO($this->DB_DSN, $this->DB_USER, $this->DB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }
    }
}
?>
