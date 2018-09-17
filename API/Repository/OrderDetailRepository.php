<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/9/18
 * Time: 11:00 PM
 */

interface OrderDetailRepository
{
    public function setConnection(mysqli $connction);

    public function addOrderItem($qty, $unitPrice, $orderId, $itemId);

    public function updateOrderItem($id, $qty, $unitPrice, $orderId, $itemId);

    public function removeOrderItem($orderId, $itemId);

    public function findOrderItem($orderId, $itemId);

    public function getAllOrderItems();


}