<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/9/18
 * Time: 10:27 PM
 */

require_once __DIR__ . '/../iOrderRepository.php';
require_once __DIR__.'/../../DB/DBConnection.php';

class iOrderRepositoryImpl implements iOrderRepository
{

    private $connection;
    public function __construct()
    {
        $this->connection = (new DBConnection())->getConnection();
    }

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function addOrder($date, $send, $uname)
    {

      $pre = $this->connection->prepare("INSERT INTO iOrder (date,send,username) VALUES (?,?,?)");

      $pre->bind_param("dis",$date,$send,$uname);
     $result = $pre->execute();
      if($result&&$pre->affected_rows>0){
          return $this->connection->insert_id;
      }else{
          return false;
      }
    }

    public function updateOrder($orderId)
    {
        // TODO: Implement updateOrder() method.
    }

    public function removeOrder($orderId)
    {
        // TODO: Implement removeOrder() method.
    }

    public function getOrder($orderId)
    {
        // TODO: Implement getOrder() method.
    }

    public function getAllOrders()
    {
        // TODO: Implement getAllOrders() method.
    }
}