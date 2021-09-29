<style type="text/css">
    .error{
        font-size: 12px;
        color: red;
    }
</style>
<div class="row">
    <div class="col-md-12">
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
                <form  action="" method="POST" name="update_user_info" id="sign-up" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Name</label>
                        <div class="col-md-8">
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo $user[0]['name']; ?>">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-8">
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo $user[0]['email']; ?>" >
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="name_en" class="col-md-2 col-form-label">Mobile No</label>
                        <div class="col-md-8">
                            <input type="text" id="mobile" name="mobile" class="form-control" value="<?php echo $user[0]['phone']; ?>">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-8">
                            <input type="text" id="password" name="password" class="form-control" value="<?php echo $user[0]['password']; ?>">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-md-2 col-form-label">New Image</label>
                        <div class="col-md-8">
                            <input type="file" id="image" name="image" class="form-control" >
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-md-2 col-form-label"> Image</label>
                        <div class="col-md-8">
                            <?php
                            $image='empty.png';
                            if (!empty($user[0]['image']) && file_exists('image/'.$user[0]['image'])){
                                $image=$user[0]['image'];
                            } ?>
                            <img src="<?='image/'.$image?>" style="width: 140px ; height: 160px;">
                        </div>

                    </div>


                    <div class="form-group row">


                        <div class="col-md-6 offset-md-2">
                            <button type="submit" class="btn btn-success" style="">Update</button>

                        </div>

                    </div>








                </form>
            </div>
        </div>
    </div>
</div>
