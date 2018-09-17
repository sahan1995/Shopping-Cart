<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/6/18
 * Time: 4:22 PM
 */

interface UserRepository
{
    public function setConnection(mysqli $connection);

    public function addUser($fullname,$contact,$address,$unmae,$password,$isAdmin);

    public function seachUser($uname);

    public function login($uname,$password);
}