<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/4/18
 * Time: 7:51 PM
 */
require_once 'Business/BusinessImpl/ItemBOImpl.php';
header("Content-Type: application/json");
$method = $_SERVER["REQUEST_METHOD"];
$itemBOImpl = new ItemBOImpl();

switch ($method){
    case "GET":
        $action = $_GET["action"];
        switch ($action){
            case "all":
                echo json_encode($itemBOImpl->getAllItems());
                break;
            case "byID":
                $itemID = $_GET["ID"];
                echo json_encode($itemBOImpl->findItem($itemID));
                break;

        }
        break;
}
