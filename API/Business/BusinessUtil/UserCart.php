<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/7/18
 * Time: 11:55 AM
 */

class UserCart
{

    public $itemCode;
    public $qty;

    /**
     * UserCart constructor.
     * @param $itemCode
     * @param $qty
     */
    public function __construct($itemCode, $qty)
    {
        $this->itemCode = $itemCode;
        $this->qty = $qty;
    }

    /**
     * @return mixed
     */
    public function getItemCode()
    {
        return $this->itemCode;
    }

    /**
     * @param mixed $itemCode
     */
    public function setItemCode($itemCode)
    {
        $this->itemCode = $itemCode;
    }

    /**
     * @return mixed
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * @param mixed $qty
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
    }




}