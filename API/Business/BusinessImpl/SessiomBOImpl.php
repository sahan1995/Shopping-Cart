<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/6/18
 * Time: 2:49 PM
 */

require_once __DIR__ . '/../SessionBO.php';
require_once __DIR__ . '/../../Repository/RepositoryImpl/UserRepositoryImpl.php';
require_once __DIR__ . '/../../Business/BusinessUtil/UserCart.php';

class SessiomBOImpl implements SessionBO
{

    private $sessionArray;
    private $userRepositoryImpl;
    private $userCartarray;

    public function __construct()
    {
        $this->userRepositoryImpl = new UserRepositoryImpl();


    }

    public function isSession()
    {
        session_set_cookie_params(90 * 60);
        session_start();
        if (isset($_SESSION["status"])) {
            $fullname = $_SESSION["fullname"];
            $uname = $_SESSION["uname"];
            return $this->sessionArray = array("status" => true, "fullname" => $fullname, "un" => $uname);
        } else {
            session_unset();
            session_destroy();
            return $this->sessionArray = array("status" => false);
        }

    }

    public function loginANDsession($uname, $Pass)
    {

        $result = $this->userRepositoryImpl->login($uname, $Pass);

        if ($result != null) {
            session_set_cookie_params(90 * 60);
            session_start();
            $_SESSION["status"] = true;
            $_SESSION["fullname"] = $result["fullname"];
            $_SESSION["uname"] = $result["username"];
            $_SESSION["cart"] = array();
            return true;
        } else {
            return false;
        }
    }


    public function userCart($itemcode, $qty)
    {

        session_set_cookie_params(90 * 60);
        session_start();

        $found = false;


        $this->userCartarray = &$_SESSION["cart"];

        foreach ($_SESSION["cart"] as $value){

            if($value->getItemCode()==$itemcode){
                $found = true;
//                echo "Same";
                $value->setQty($value->getQty()+$qty);
            }
        }

        if($found==false){
            $this->userCartarray[] = (new UserCart($itemcode, $qty));
            $_SESSION["cart"] = $this->userCartarray;
        }

//        print_r($_SESSION["cart"]);

        return true;
    }

    public function UpdateCart($itemcode, $qty){
        session_set_cookie_params(90 * 60);
        session_start();

        $this->userCartarray = &$_SESSION["cart"];


        foreach ($_SESSION["cart"] as $value){

            if($value->getItemCode()==$itemcode){


                $value->setQty($qty);
                return true;
            }
        }


    }

    public function getUserCart()
    {
        session_set_cookie_params(90 * 60);
        session_start();
        return $_SESSION;
    }

    public function logOut()
    {
        session_start();
        session_unset();
        session_destroy();
        return true;
    }

    public function removeItem($itemcode)
    {
        session_set_cookie_params(90 * 60);
        session_start();

        $this->userCartarray = &$_SESSION["cart"];
        foreach ($_SESSION["cart"] as $key => $value){

            if($value->getItemCode()==$itemcode){
                unset($_SESSION["cart"][$key]);
                return true;
            }


        }
    }

    public function signUpANDsession($fullname, $contact, $address, $unmae, $password, $isAdmin)
    {
       $result = $this->userRepositoryImpl->addUser($fullname,$contact,$address,$unmae,$password,$isAdmin);

       if($result){
           session_set_cookie_params(90*60);
           session_start();
           $_SESSION["status"] = true;
           $_SESSION["fullname"] = $fullname;
           $_SESSION["uname"] = $unmae;
           $_SESSION["cart"] = array();
           return true;

       }else{
           return false;
       }


    }
}