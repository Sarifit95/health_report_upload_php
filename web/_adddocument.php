
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
                <h3 style="text-align: center;">Add New Document</h3>
                <form  action="" method="POST" name="update_user_info" id="sign-up" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="type" class="col-md-2 col-form-label">Document Type</label>
                        <div class="col-md-8">
                            <input type="text" id="type" name="type" class="form-control" value="">
                        </div>

                    </div>



                    <div class="form-group row">
                        <label for="image" class="col-md-2 col-form-label"> Image</label>
                        <div class="col-md-8">
                            <input type="file" id="image" name="image" class="form-control" >
                        </div>

                    </div>



                    <div class="form-group row">


                        <div class="col-md-6 offset-md-2">
                            <button type="submit" class="btn btn-success" style="">Submit</button>

                        </div>

                    </div>








                </form>
            </div>
        </div>
    </div>
</div>
