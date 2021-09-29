<h3 style="text-align: center">Sign Up</h3>

<style type="text/css">
    .btn-success{
        box-shadow: 4px 4px green; border-radius:10px;
    }
    .card{
        box-shadow: 8px 8px royalblue; border-radius: 10px;
        border: 1px solid royalblue !important;
    }
    .error{
        font-size: 12px;
        color: red;
    }

</style>
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <?php
            if (!empty($_SESSION['msg'])){
                ?>
                <p style="text-align: center; background-color: green;color: white;" >
                    <?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>
                </p>

            <?php

            }

            ?>
            <div class="card-body" style=" text-align: center;">
                <form  action="" method="POST" name="sign-up" id="sign-up" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Name</label>
                        <div class="col-md-8">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-8">
                            <input type="email" id="email" name="email" class="form-control" >
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="name_en" class="col-md-2 col-form-label">Mobile No</label>
                        <div class="col-md-8">
                            <input type="text" id="mobile" name="mobile" class="form-control" placeholder="01*********">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-md-2 col-form-label">Image</label>
                        <div class="col-md-8">
                            <input type="file" id="image" name="image" class="form-control" placeholder="01*********">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-8">
                            <input type="text" id="password" name="password" class="form-control" >
                        </div>

                    </div>
                    <div class="form-group row ">
                        <label  class="col-md-6 offset-md-2 col-form-label offset-md-1">Already have an account?<a href="index">Login</a></label>


                    </div>
                    <div class="form-group row">


                        <div class="col-md-6 offset-md-2">
                            <button type="submit" class="btn btn-success" style="">Sign up</button>

                        </div>

                    </div>








                </form>
            </div>
        </div>
    </div>
</div>
