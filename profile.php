<?php
ob_start();
session_start();
if (empty($_SESSION['user_id'])){
    header("Location:index");
}


?>


<div class="container">



<div class="row">
  <?php   include("web/_sidebar.php");
  require_once ("class/UserInformation.php");
  $userinfo=new UserInformation();
  $user= $userinfo->getuser($_SESSION['user_id']);
  ?>
    <div class="col-md-8">


    <?php
    if (isset($_REQUEST['action']) && $_REQUEST['action']=='edit'){

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
                    echo '<script>location.href="profile?action=edit";</script>';
                    exit();

                }
                else{
                    require_once ("class/ImageUpload.php");
                    $imageupload=new ImageUpload();

                        if(!empty($_SESSION['user_image'])){
                            $imageupload->removefile($_SESSION['user_image'], 'image');
                        }


                    $imageupload->imagesave('image', $mobile, 'image', 300,300);
                    $image=$mobile.'.'.$file_extension;

                }
            }



            $user=$userinfo->updateinfo($_SESSION['user_id'],$name,$email,$mobile,$image, $password);

            if ($user){


                $_SESSION['user_id']=$user[0]['id'];
                $_SESSION['user_name']=$user[0]['name'];
                $_SESSION['user_image']=$user[0]['image'];
                $_SESSION['imsg']="Information Updated Successfully";



                header("Location:profile");
            }



        }

        include("web/_editUserInfo.php");

    }
    else{

    ?>

        <?php

        include("web/_userinfo.php");


    }
        ?>


    </div>
</div>


</div>



<?php

if (isset($_REQUEST['action']) && $_REQUEST['action']=='edit'){

    ?>

    <script src="js/registration.js" type="text/javascript"></script>


    <?php
}
$main_content=ob_get_contents();
ob_end_clean();
include ("web/_layout.php");

?>
