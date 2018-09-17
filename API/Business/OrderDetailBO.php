<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/10/18
 * Time: 9:53 AM
 */

interface OrderDetailBO
{
    public function addOrderItem($qty, $unitPrice, $orderId, $itemId);

    public function updateOrderItem($id, $qty, $unitPrice, $orderId, $itemId);

    public function removeOrderItem($orderId, $itemId);

    public function findOrderItem($orderId, $itemId);

    public function getAllOrderItems();
}