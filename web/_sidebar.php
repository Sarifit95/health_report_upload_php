

<div class="col-md-3">

        <style>
body {
    margin: 0;
    font-family: "Lato", sans-serif;
            }

            .sidebar {
    margin: 0;
    padding: 0;
    width: 200px;
                background-color: #f1f1f1;
                height: 100%;
                overflow: auto;
            }

            .sidebar a {
    display: block;
    color: black;
    padding: 16px;
                text-decoration: none;
            }

            .sidebar a.active {
    background-color: #B0E57C;
                color: white;
            }

            .sidebar a:hover:not(.active) {
    background-color: #00b5ad;
                color: white;
            }

            div.content {
    margin-left: 200px;
                padding: 1px 16px;
                height: 1000px;
            }

            @media screen and (max-width: 700px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }
                .sidebar a {float: left;}
                div.content {margin-left: 0;}
            }

            @media screen and (max-width: 400px) {
    .sidebar a {
        text-align: center;
                    float: none;
                }
            }
        </style>
        <style type="text/css">

            .mselect{
    background-color: #ACC1FF;
                border-radius: 10px;
            }

        </style>



    <div class="sidebar">
        <?php
        $image='empty.png';

        if (!empty($_SESSION['user_image']) && file_exists('image/'.$_SESSION['user_image'])){
           $image= $_SESSION['user_image'];
        } ?>
            <a style="text-align: center;" class="active " href="profile">
                <img src="image/<?=$image?>" style="width: 50px; height: 50px; border-radius: 50%;" alt="">
                <p style="color: black"><?=$_SESSION['user_name']?></p>
            </a>
            <a class="cb" id="user" href="user.php?lang=bn">User Information</a>
            <a class="cb" id="documents" href="documents.php?lang=bn">Documents</a>

        </div>


        <script>

            var url = window.location.pathname;

            if(url.includes("/user.php") ==true ) {
                $("#user").addClass("mselect");

            }  else if(url.includes("/documents.php") ==true ) {
                $("#documents").addClass("mselect");

            }

        </script>

    </div>
