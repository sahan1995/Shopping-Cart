<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/9/18
 * Time: 10:47 PM
 */


require_once 'Business/BusinessImpl/iOrderBOImpl.php';
header("Content-Type: application/json");
$method = $_SERVER["REQUEST_METHOD"];
$iOrderBo = new iOrderBOImpl();


switch ($method){
    case "POST":
        $action = $_POST["action"];
        switch ($action){
            case "addOrder":
              $date = $_POST["date"];
              session_start();
              $uname = $_SESSION["uname"];

              echo json_encode($iOrderBo->addOrder($date,0,$uname));

                break;
        }
        break;
}