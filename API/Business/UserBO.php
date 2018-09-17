<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 8/6/18
 * Time: 4:34 PM
 */

interface UserBO
{
    public function addUser();


    public function login($uname,$password);

    public function searchUser($uname);
}