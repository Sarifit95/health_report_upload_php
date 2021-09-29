<?php
//require_once ("class/DBController.php");
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/class/DBController.php');

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
    function mobileexist($phone){
     $query = "SELECT * FROM users  WHERE phone = ? ";

        $paramType = "i";
        $paramValue = array(
            $phone,
        );
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result[0]['id'];
    }
    function editmobileexist($phone, $id){
     $query = "SELECT * FROM users  WHERE phone = ? and id!=? ";

        $paramType = "ii";
        $paramValue = array(
            $phone,
            $id,
        );
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result[0]['id'];
    }
    function register($name, $email, $mobile, $image, $password) {


        $query = "INSERT INTO users (name, email, phone, password, image) VALUES (?, ?, ?, ?, ?)";
        $paramType = "sssss";
        $paramValue = array(
            $name,
            $email,
            $mobile,
            $password,
            $image
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }







}
