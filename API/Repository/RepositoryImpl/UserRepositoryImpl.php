<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/6/18
 * Time: 4:24 PM
 */


require_once __DIR__ . '/../UserRepository.php';
require_once __DIR__.'/../../DB/DBConnection.php';



class UserRepositoryImpl implements UserRepository
{

    private $connection;

    public function __construct()
    {
        $this->connection = (new DBConnection())->getConnection();
    }

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function addUser($fullname,$contact,$address,$unmae,$password,$isAdmin)
    {
        $pre = $this->connection->prepare("INSERT INTO user (fullname,contact,address,username,password,isAdmin ) VALUES (?,?,?,?,?,?)");
        $pre->bind_param("sssssi",$fullname,$contact,$address,$unmae,$password,$isAdmin);
        $result = $pre->execute();
        if($result&&$pre->affected_rows>0){
            return true;
        }else{
            return false;
        }

    }

    public function login($uname, $password)
    {

        $results = $this->connection->query("SELECT * FROM user WHERE username = '$uname' AND password = '$password'");

        return $results->fetch_assoc();


    }

    public function seachUser($uname)
    {
        $result  = $this->connection->query("SELECT fullname FROM user WHERE username = '$uname'");
        return $result->num_rows;

    }
}