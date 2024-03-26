<?php
  require_once("./config.php");

class Database
{
    private $host;
    private $user;
    private $password;
    private $dbname;
    private $status;
    private $conn;

    public function __construct()
    {
        $conf = new DatabaseConfig();

        $this->host = $conf->loadDBHost() ?? 'localhost';
        $this->user = $conf->loadDBUser() ?? 'root';
        $this->password = $conf->loadDBPass() ?? '';
        $this->dbname = $conf->loadDBName() ?? 'registration_db';
        $this->status = false;

        $this->conn = $this->init();
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function closeConnection()
    {
        $this->conn = null;
    }
    // MySQL
    private function init()
    {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=" . $this->dbname, $this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->status = true;

            return $conn;
        } catch (PDOException $e) {
            echo "Connection failure: " . $e->getMessage();
        }
    }
    // MsSQL
    // private function init()
    // {
    //     try {
    //         $conn = new PDO("sqlsrv:Server=$this->host;dbname=" . $this->dbname, $this->user, $this->password);
    //         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         $this->status = true;
    //
    //         return $conn;
    //     } catch (PDOException $e) {
    //         echo "Connection failure: " . $e->getMessage();
    //     }
    // }

}
?>
