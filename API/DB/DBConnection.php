<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/4/18
 * Time: 7:21 PM
 */

class DBConnection
{
    private $host = "127.0.0.1";
    private $username = "root";
    private $password = "";
    private $port = 3306;
    private $database = "ShoppingCart";

    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database, $this->port);
        if ($this->connection->connect_errno) {
            echo $this->connection->connect_error;
            die;
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}