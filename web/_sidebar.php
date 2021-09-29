

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

            .sidebar .documents:hover:not(.active) {
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
            .documents{
                text-align: center;
                background-color: green;
                width: 77px;
                margin: auto;
                margin-top: 10px;
                margin-bottom: 10px;
                font-size: 13px;
                padding: 5px !important;
                border-radius: 10px;
                color: wheat !important;
                font-weight: bold;
                box-shadow: 3px 4px black;
            }
            .logout{
                text-align: center;
                background-color: red;
                width: 77px;
                margin: auto;
                font-size: 13px;
                padding: 5px !important;
                border-radius: 10px;
                color: wheat !important;
                font-weight: bold;
                box-shadow: 3px 4px darkred;
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

            <a class="cb documents" id="documents" href="document">Documents</a>
            <a class="logout" href="index?action=log_out">Logout</a>

        </div>


        <script>

            var url = window.location.pathname;
                 if(url.includes("/documents") ==true ) {
                $("#documents").addClass("mselect");

            }

        </script>

    </div>
