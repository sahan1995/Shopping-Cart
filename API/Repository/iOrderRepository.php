<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/9/18
 * Time: 10:19 PM
 */

interface iOrderRepository
{


    public function setConnection(mysqli $connection);

    public function addOrder($date, $send, $uname);

    public function updateOrder($orderId);

    public function removeOrder($orderId);

    public function getOrder($orderId);

    public function getAllOrders();
}