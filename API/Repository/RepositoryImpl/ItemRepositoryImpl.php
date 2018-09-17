<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/4/18
 * Time: 7:32 PM
 */


require_once __DIR__ . '/../ItemRepository.php';
require_once __DIR__.'/../../DB/DBConnection.php';

class ItemRepositoryImpl implements ItemRepository
{
    private $connection;
    public function __construct()
    {
        $this->connection=(new DBConnection())->getConnection();
    }

    public function setConnection(mysqli $connetion)
    {
        $this->connection = $connetion;
    }

    public function addItem($itemCode, $itemName, $stock, $unitPrice, $imgPath)
    {
        // TODO: Implement addItem() method.
    }

    public function updateItem($itemCode, $itemName, $stock, $unitPrice)
    {
        // TODO: Implement updateItem() method.
    }

    public function deleteItem($itemCode)
    {
        // TODO: Implement deleteItem() method.
    }

    public function findItem($itemCode)
    {


        $resultSett = $this->connection->query("SELECT * FROM item WHERE itemID = '$itemCode'");
        return $resultSett->fetch_all(MYSQLI_ASSOC);

    }

    public function getAllItems()
    {

        $resultset = $this->connection->query("SELECT * FROM item");
        return $resultset->fetch_all(MYSQLI_ASSOC);



    }
}