<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/6/18
 * Time: 2:51 PM
 */
require_once 'Business/BusinessImpl/SessiomBOImpl.php';
header("Content-Type: application/json");
$method = $_SERVER["REQUEST_METHOD"];
$sessionBoImpl = new SessiomBOImpl();

switch ($method){
    case  "GET":
            $action = $_GET["action"];
            switch ($action){
                case "isSession":

                  echo json_encode($sessionBoImpl->isSession());
                    break;
                case "userCart":
                    echo json_encode($sessionBoImpl->getUserCart());
                    break;
                case "logOut":
                    echo  json_encode($sessionBoImpl->logOut());
                    break;
            }
            break;

    case  "POST" :
        $action = $_POST['action'];
        switch ($action){
            case "login":
                $uname = $_POST["uname"];
                $pass = $_POST["pass"];
                echo json_encode($sessionBoImpl->loginANDsession($uname,$pass));
                break;
            case "cart":
                $itemCode = $_POST["itemcode"];
                $qty = $_POST["qty"];
                echo json_encode($sessionBoImpl->userCart($itemCode,$qty));
                break;
            case "updateQty":
                $itemCode = $_POST["itemcode"];
                $qty = $_POST["qty"];
                echo json_encode($sessionBoImpl->UpdateCart($itemCode,$qty));
                break;
            case "removeItem":
                $itemCode = $_POST["itemcode"];
                echo json_encode($sessionBoImpl->removeItem($itemCode));
                break;
            case "signup":
                $fullname = $_POST["fullname"];
                $contact = $_POST["contact"];
                $address = $_POST["address"];
                $uname = $_POST["uname"];
                $pass = $_POST["password"];
                $isAdmin = $_POST["isAdmin"];
                echo json_encode($sessionBoImpl->signUpANDsession($fullname,$contact,$address,$uname,$pass,$isAdmin));
                break;
        }
    break;
}
