<?php
//require_once ("class/DBController.php");
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/class/DBController.php');

class UserInformation
{
    private $db_handle;

    function __construct() {
        $this->db_handle = new DBController();
    }
    function getuser($id) {
        $query = "SELECT * FROM users  WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
          $id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);

        return $result;
    }



    function updateinfo($id,$name, $email, $mobile, $image, $password) {
        if (empty($image) || $image==''){

            $query = "UPDATE users SET name = ?,email = ?,phone = ?,password = ? WHERE id = ?";
            $paramType = "ssssi";
            $paramValue = array(
                $name,
                $email,
                $mobile,
                $password,
                $id,

            );


        }
        else{
            $query = "UPDATE users SET name = ?,email = ?,phone = ?,password = ?,image = ? WHERE id = ?";
            $paramType = "sssssi";
            $paramValue = array(
                $name,
                $email,
                $mobile,
                $password,
                $image,
                $id,

            );
        }


      $result=  $this->db_handle->update($query, $paramType, $paramValue);
     return $this->getuser($id);

    }





}
