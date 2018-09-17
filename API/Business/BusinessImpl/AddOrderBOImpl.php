<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/10/18
 * Time: 10:06 AM
 */
require_once __DIR__ . '/../AddOrderBO.php';
require_once __DIR__ . '/../../Business/BusinessImpl/iOrderBOImpl.php';
require_once __DIR__ . '/../../Business/BusinessImpl/OrderDetailBOImpl.php';
class AddOrderBOImpl implements AddOrderBO{

private $iorderBoImpl;
private $orderDetailImpl;
private $done =false;

    public function __construct()
    {
        $this->iorderBoImpl=new iOrderBOImpl();
        $this->orderDetailImpl = new OrderDetailBOImpl();
    }

    public function addOrder($qty, $unitPrice,$itemId, $date, $send, $uname)
    {

        $connection = (new DBConnection())->getConnection();
        $connection->autocommit(false);

        if($this->done==false){
            $id=$this->iorderBoImpl->addOrder($date,$send,$uname);
            $this->done = true;
        }

      if($id!=null){
         $result =  $this->orderDetailImpl->addOrderItem($qty,$unitPrice,$id,$itemId);
         if($result){
             $connection->commit();
             return true;
         }else{
             $connection->rollback();
         }
      }else{
          $connection->rollback();
      }

    }
}