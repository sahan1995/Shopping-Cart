<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/10/18
 * Time: 9:54 AM
 */

require_once __DIR__ . '/../OrderDetailBO.php';
require_once __DIR__ . '/../../Repository/RepositoryImpl/OrderDetailRepositoryImpl.php';

class OrderDetailBOImpl implements OrderDetailBO
{


    private $orderDetailRep;

    public function __construct()
    {
        $this->orderDetailRep = new OrderDetailRepositoryImpl();
    }

    public function addOrderItem($qty, $unitPrice, $orderId, $itemId)
    {
        $connection = (new DBConnection())->getConnection();
        $this->orderDetailRep->setConnection($connection);
        $result = $this->orderDetailRep->addOrderItem($qty,$unitPrice,$orderId,$itemId);
        mysqli_close($connection);
        return $result;

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