<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/10/18
 * Time: 10:01 AM
 */

interface AddOrderBO
{

    public function addOrder($qty, $unitPrice,$itemId,$date, $send, $uname);

}