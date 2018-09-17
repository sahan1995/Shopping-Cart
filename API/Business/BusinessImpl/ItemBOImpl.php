<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/4/18
 * Time: 7:45 PM
 */
require_once __DIR__ . '/../ItemBO.php';
require_once __DIR__ . '/../../Repository/RepositoryImpl/ItemRepositoryImpl.php';

class ItemBOImpl implements ItemBO
{


    private $itemRepo;

    public function __construct()
    {

        $this->itemRepo = new ItemRepositoryImpl();
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
        $connection = (new DBConnection())->getConnection();
        $this->itemRepo->setConnection($connection);
        $itemArray = $this->itemRepo->findItem($itemCode);
        mysqli_close($connection);
       return $itemArray;
    }


    public function getAllItems()
    {
        $connection = (new DBConnection())->getConnection();
        $this->itemRepo->setConnection($connection);
        $itemArray = $this->itemRepo->getAllItems();
        mysqli_close($connection);

        return $itemArray;

    }
}