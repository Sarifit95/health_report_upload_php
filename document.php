<?php
ob_start();
session_start();
if (empty($_SESSION['user_id'])){
    //if user not login then redirect index page this means login page
    header("Location:index");
}
?>


<div class="container">

<div class="row">
  <?php   include("web/_sidebar.php");
  require_once ("class/Document.php");
  $document=new Document();
  $loginuser= $_SESSION['user_id'];  //login user id assign in variable loginuser
  ?>
    <div class="col-md-8">


    <?php
    if (isset($_REQUEST['action']) && $_REQUEST['action']=='add_new'){ // action==add_new is when user is need to add document

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $type=trim($_POST['type']);
            $image="";
            $allowed_image_extension = array("png", "jpg", "jpeg");
            $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

           //check image file is selected if selected then check this file extension
            //only image png, jpeg or jpeg file is allow
            if ( file_exists($_FILES["image"]["tmp_name"])) {

                //if image file is not same extension with png or jpg or jpeg then message show and redirect form
                //else another
                if(! in_array($file_extension, $allowed_image_extension)){

                    $_SESSION['msg']="Upload valid images. Only PNG and JPEG are allowed.";
                    echo '<script>location.href="document?action=add_new";</script>';
                    exit();

                }
                else{
                    require_once ("class/ImageUpload.php");
                    $imageupload=new ImageUpload();
                    $file=$loginuser.time();

                    $imageupload->imagesave('image', $file, 'documents', 500,800);
                    $image=$file.'.'.$file_extension;

                }
            }

            //addDocument function call in object $document and add with argument with there variable
            $inset=$document->addDocument($loginuser,$type, $image);

            if ($inset){


                $_SESSION['imsg']="Document Inserted Successfully!";

                header("Location:document");
            }



        }


        include("web/_adddocument.php"); //add document form and field


    }

    if (isset($_REQUEST['action']) &&  $_REQUEST['action']=='delete' && isset($_GET['id'])){
        $documentid=$_GET['id'];
        $deletedocument=$document->getDocumentById($documentid); // select document for image name


        //Document image unlink/remove which is delete
        if (!empty($deletedocument[0]['image']) && file_exists('documents/'.$deletedocument[0]['image'])){
            require_once ("class/ImageUpload.php");
            $imageupload=new ImageUpload();
            $imageupload->removefile($deletedocument[0]['image'], 'documents');

        }
        $document->deleteDocument($documentid); //for delete document data

        $_SESSION['imsg']="Document Deleted Successfully!";

        echo '<script>location.href="document";</script>';
        exit();


    }

    else if (!isset($_REQUEST['action'])){

        //get all document which user is login and assing variable $alldocument
       $alldocument= $document->getAllDocument($loginuser);
       ?>
        <?php
        // tabel include for show all document
        include("web/_documents.php");

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
