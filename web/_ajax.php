<?php
session_start();
require_once ("../class/Login.php");

$loginuser=new Login();

if (!empty($_SESSION['user_id'])){

    if(!empty($_POST['mobile'])) {
        $phone = $_POST['mobile'];

        $islog=$loginuser->editmobileexist($phone, $_SESSION['user_id']);
        if($islog)
        {


            echo "false";  //good to register
        }
        else
        {
            echo "true"; //already registered
        }

    }

}
else{
    if(!empty($_POST['mobile']) && !isset($_POST['login'])) {
        $phone = $_POST['mobile'];

        $islog=$loginuser->mobileexist($phone);
        if($islog)
        {


            echo "false";  //good to register
        }
        else
        {
            echo "true"; //already registered
        }

    }
    if(!empty($_POST['phone']) && isset($_POST['login'])) {
        $phone = $_POST['phone'];

        $islog=$loginuser->mobileexist($phone);
        if($islog)
        {
            echo "true";
        }
        else
        {
            echo "false";
        }

    }
}




