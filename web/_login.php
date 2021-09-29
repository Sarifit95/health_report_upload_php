<h3 style="text-align: center">Login</h3>

<div class="row">
    <style type="text/css">
        .loginbtn{
            box-shadow: 4px 4px green; border-radius:10px;
        }
        .border{
            box-shadow: 8px 8px royalblue; border-radius: 10px;
            border: 1px solid royalblue !important;
        }
        .error{
            color: red;
            font-size: 12px;
        }

    </style>
    <div class="col-md-8 offset-md-2">
        <div class="card border" style="">
            <div class="card-body" style=" text-align: center;">
                <?php
                if (!empty($_SESSION['msg'])){
                    ?>
                    <p style="text-align: center; background-color: green;color: white;" >
                        <?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>
                    </p>

                    <?php

                }

                ?>
                <form  action="" method="POST" name="login" id="login" novalidate="novalidate">

                    <div class="form-group row">
                        <label for="name_en" class="col-md-2 col-form-label">Mobile No</label>
                        <div class="col-md-8">
                            <input type="text" id="mobile" name="mobile" class="form-control" placeholder="01*********">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-8">
                            <input type="password" id="password" name="password" class="form-control" >
                        </div>

                    </div>
                    <div class="form-group row ">
                        <label  class="col-md-6 offset-md-2 col-form-label offset-md-1">Don't have an account?<a href="index?action=sign-up"> Sign up</a></label>


                    </div>
                    <div class="form-group row">


                        <div class="col-md-6 offset-md-2">
                            <button  type="submit" class="btn btn-success loginbtn" style="">Log In</button>

                        </div>

                    </div>








                </form>
            </div>
        </div>
    </div>
</div>
