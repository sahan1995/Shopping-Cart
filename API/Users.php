<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/6/18
 * Time: 6:41 PM
 */
require_once 'Business/BusinessImpl/UserBOImpl.php';
header("Content-Type: application/json");
$method = $_SERVER["REQUEST_METHOD"];
$userBoImpl = new UserBOImpl();


switch ($method){
    case "POST":
        $action = $_POST['action'];
        switch ($action){
            case "login":
                $uname = $_POST["uname"];
                $pass = $_POST["pass"];
                echo json_encode($userBoImpl->login($uname,$pass));
                break;
            case "searchUser":
                $uname = $_POST["uname"];
                echo  json_encode($userBoImpl->searchUser($uname));
                break;

        }

        break;
}