<?php
ob_start();
session_start();
if (!empty($_SESSION['user_id'])){
    header("Location:profile");
}



?>


<div class="container">




    <?php
    if (isset($_REQUEST['action'])  && $_REQUEST['action']=='sign-up'){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name=trim($_POST['name']);
        $email=trim($_POST['email']);
        $mobile=trim($_POST['mobile']);
        $image="";
        $password=trim($_POST['password']);

        $allowed_image_extension = array("png", "jpg", "jpeg");
        $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

        if ( file_exists($_FILES["image"]["tmp_name"])) {


            if(! in_array($file_extension, $allowed_image_extension)){

                $_SESSION['msg']="Upload valid images. Only PNG and JPEG are allowed.";
                echo '<script>location.href="index?action=sign-up";</script>';
                exit();

            }
            else{
                require_once ("class/ImageUpload.php");
                $imageupload=new ImageUpload();

                $imageupload->imagesave('image', $mobile, 'image', 300,300);
                $image=$mobile.'.'.$file_extension;

            }
        }


        require_once ("class/Login.php");
        $register=new Login();
        $isregister=$register->register($name,$email,$mobile,$image, $password);
        require_once ("class/UserInformation.php");
        $registeruser=new UserInformation();
        $user=$registeruser->getuser($isregister);

        if ($user){


            $_SESSION['user_id']=$user[0]['id'];
            $_SESSION['user_name']=$user[0]['name'];
            $_SESSION['user_image']=$user[0]['image'];



            header("Location:profile");
        }



    }

        include("web/_sign_up.php");
    }
    if (isset($_REQUEST['action']) && $_REQUEST['action']=='log_out'){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_image']);
        $_SESSION['msg']="You have successfully logged out";
        header("Location:index");
    }
    else if (!isset($_REQUEST['action'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mobile=$_POST['mobile'];
            $password=$_POST['password'];
            require_once ("class/Login.php");

            $loginuser=new Login();
            $islog=$loginuser->loginuser($mobile, $password);

            if ($islog){


                  $_SESSION['user_id']=$islog[0]['id'];
                  $_SESSION['user_name']=$islog[0]['name'];
                $_SESSION['user_image']=$islog[0]['image'];



                header("Location:profile");
            }
            else{
                $_SESSION['msg']="Type the correct Phone no and password, and try again!";
            }




        }


        include("web/_login.php");

    }


    ?>


</div>

<?php
if (isset($_REQUEST['action']) && $_REQUEST['action']=='sign-up'){
?>
<script src="js/registration.js" type="text/javascript"></script>

<?php
}
else if (!isset($_REQUEST['action'])){
?>

    <script src="js/login.js" type="text/javascript"></script>


<?php
}
?>


<?php
?>


<?php

$main_content=ob_get_contents();
ob_end_clean();
include ("web/_layout.php");

?>
