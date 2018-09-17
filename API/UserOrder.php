<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/10/18
 * Time: 11:51 AM
 */

require_once 'Business/BusinessImpl/AddOrderBOImpl.php';
require_once 'Business/BusinessImpl/ItemBOImpl.php';
//include PATH_TO_CLASS . 'Business/BusinessImpl/SessionBOImpl.php';
header("Content-Type: application/json");
$method = $_SERVER["REQUEST_METHOD"];
$userOrderBo = new AddOrderBOImpl();
$itemBo  = new ItemBOImpl();
switch ($method){
    case "POST":
        $action=$_POST["action"];
        switch ($action){
            case "addOrder":
                $type = $_POST["type"];
                switch ($type){

                    case "one":
                        session_start();
                        $qty = $_POST["qty"];
                        $unitPrice = $_POST["unitPrice"];
                        $itemId = $_POST["itemId"];
                        $date = $_POST["date"];
//                        $uname = $_POST["uname"];
                        session_start();
                        $uname= $_SESSION["uname"];
                        echo json_encode($userOrderBo->addOrder($qty,$unitPrice,$itemId,$date,0,$uname));
                        break;
                    case "all":
                        session_start();
                        include "Business/BusinessUtil/UserCart.php";
                        echo json_encode($_SESSION["cart"]);
//                        print_r($_SESSION["cart"]);
                        foreach ($_SESSION["cart"] as $value) {


                            echo $value->getItemCode();
//                            $uname = $_POST["uname"];
//                            $date = $_POST["date"];
//                            print_r($value);
//                            $resultset = $itemBo->findItem($value->getItemCode());
//                            $unitPrice = $resultset["unitPrice"];
//                            echo json_encode($userOrderBo->addOrder($value->getQty,$unitPrice,$value->getItemCode(),$date,0,$uname));
                            break;

                        }


                }

            break;
        }
        break;
}

//public function addOrder($qty, $unitPrice,$itemId, $date, $send, $uname);