<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/9/18
 * Time: 11:06 PM
 */
require_once __DIR__ . '/../OrderDetailRepository.php';
require_once __DIR__.'/../../DB/DBConnection.php';
class OrderDetailRepositoryImpl implements OrderDetailRepository
{

    private $connection;

    public function __construct()
    {
        $this->connection = (new DBConnection())->getConnection();
    }

    public function setConnection(mysqli $connction)
    {
        $this->connection= $this->connection;
    }

    public function addOrderItem($qty, $unitPrice, $orderId, $itemId)
    {

        $pre = $this->connection->prepare("INSERT INTO orderDetial (qty, unitPrice, orderID, ItemID) VALUES (?,?,?,?)");
        $pre->bind_param("idis",$qty,$unitPrice,$orderId,$itemId);
        $result=$pre->execute();
        if($result&&$pre->affected_rows>0){
            return true;
        }else{
            return false;
        }

    }

    public function updateOrderItem($id, $qty, $unitPrice, $orderId, $itemId)
    {
        // TODO: Implement updateOrderItem() method.
    }

    public function removeOrderItem($orderId, $itemId)
    {
        // TODO: Implement removeOrderItem() method.
    }

    public function findOrderItem($orderId, $itemId)
    {
        // TODO: Implement findOrderItem() method.
    }

    public function getAllOrderItems()
    {
        // TODO: Implement getAllOrderItems() method.
    }
}