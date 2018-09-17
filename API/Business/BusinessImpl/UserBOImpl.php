<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/6/18
 * Time: 4:35 PM
 */

require_once __DIR__ . '/../UserBO.php';
require_once __DIR__ . '/../../Repository/RepositoryImpl/UserRepositoryImpl.php';

class UserBOImpl implements UserBO
{
    private $userBo;

    public function __construct()
    {

        $this->userBo=new UserRepositoryImpl();
    }

    public function addUser()
    {
        // TODO: Implement addUser() method.
    }

    public function login($uname, $password)
    {
        $connection = (new DBConnection())->getConnection();

        $this->userBo->setConnection($connection);

        $result = $this->userBo->login($uname,$password);


        mysqli_close($connection);

        return $result;


    }

    public function searchUser($uname)
    {
        $connection = (new DBConnection())->getConnection();
        $this->userBo->setConnection($connection);
        $result = $this->userBo->seachUser($uname);
        if($result>0){
            return true;
        }else{
            return false;
        }
    }
}