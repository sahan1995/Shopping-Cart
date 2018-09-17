<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/6/18
 * Time: 2:47 PM
 */

interface SessionBO
{
    public function isSession();

    public function loginANDsession($uname,$Pass);

    public function userCart($itemcode,$qty);

    public function getUserCart();

    public function logOut();

    public function removeItem($itemcode);

    public function signUpANDsession($fullname,$contact,$address,$unmae,$password,$isAdmin);
}