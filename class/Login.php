<?php
require_once ("class/DBController.php");

class Login
{
    private $db_handle;

    function __construct() {
        $this->db_handle = new DBController();
    }
    function loginuser($phone, $password) {
        $query = "SELECT * FROM users  WHERE phone = ? and  password= ?";
        $paramType = "ss";
        $paramValue = array(
            $phone,
            $password
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }





}
