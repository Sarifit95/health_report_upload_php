<?php
ob_start();
session_start();
if (!empty($_SESSION['userid'])){
    header("Location:profile");
}
echo $_SESSION['userid'];


?>


<div class="container">




    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mobile=$_POST['mobile'];
        $password=$_POST['password'];
        require_once ("class/Login.php");

        $loginuser=new Login();
        $islog=$loginuser->loginuser($mobile, $password);

        if ($islog){
            $_SESSION['userid']=$islog[0]['id'];



            header("Location:profile");
        }




    }


    include("web/_login.php");
    ?>


</div>



<?php


$main_content=ob_get_contents();
ob_end_clean();
include ("web/_layout.php");

?>
