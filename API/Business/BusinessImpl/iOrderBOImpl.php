<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/9/18
 * Time: 10:43 PM
 */

require_once __DIR__ . '/../iOrderBO.php';
require_once __DIR__ . '/../../Repository/RepositoryImpl/iOrderRepositoryImpl.php';

class iOrderBOImpl implements iOrderBO
{

    private $iOrderRepImpl;
    public function __construct()
    {
        $this->iOrderRepImpl = new iOrderRepositoryImpl();
    }

    public function addOrder($date, $send, $uname)
    {
        $ID =$this->iOrderRepImpl->addOrder($date,$send,$uname);
        if($ID!=null){
            return $ID;
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