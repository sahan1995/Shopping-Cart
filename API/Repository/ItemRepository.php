<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/4/18
 * Time: 7:30 PM
 */

interface ItemRepository
{

    public function setConnection(mysqli $connetion);

    public function addItem($itemCode,$itemName,$stock,$unitPrice,$imgPath);

    public function updateItem($itemCode,$itemName,$stock,$unitPrice);

    public function deleteItem($itemCode);

    public function findItem($itemCode);

    public function getAllItems();


}