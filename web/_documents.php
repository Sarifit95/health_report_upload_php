<table class="table"
       style="width: 100%; margin: auto; border: 1px solid black; box-shadow: 5px 5px cadetblue; border-radius: 5px;">
    <thead>
    <tr>
        <th colspan="3" style="text-align: center;">All Documents</th>
        <th style="text-align: center;"><a class="btn btn-sm btn-success" href="document?action=add_new"
                                           style="color: white;">Add</a></th>

    </tr>
    <?php
    if (!empty($_SESSION['imsg'])) {
        ?>
        <tr>
            <th style="text-align: center; background-color: green;color: white;" colspan="4">

                <?php echo $_SESSION['imsg'];
                unset($_SESSION['imsg']); ?>

            </th>
        </tr>
        <?php

    }

    ?>
    <tr>
        <th>sl</th>
        <th>Type</th>
        <th>Document</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0;
    if (!empty($alldocument)) {
        foreach ($alldocument as $k => $v) {
            $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $alldocument[$k]["type"]; ?></td>
                <td>

                    <?php
                    $image = $alldocument[$k]["image"];
                    if (!empty($image) && file_exists('documents/' . $image)) {
                        ?>
                        <img title="Click on image for view" src="<?= 'documents/' . $image ?>" style="width: 35px ; height: 40px;"  data-toggle="modal" data-target="#a<?Php echo $i;?>">
                        <div class="modal fade" id="a<?Php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" >
                                <div class="modal-content" style="width: 150%;">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">  <?php echo $alldocument[$k]["type"]; ?></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img   style="width:100%; height: 100%;" src="<?= 'documents/' . $image ?>">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php
                    } ?>

                </td>
                <td>
                    <a class="btn btn-sm btn-danger"
                       href="document?action=delete&id=<?php echo $alldocument[$k]["id"]; ?>">Delete</a></td>

            </tr>
        <?php }
    } ?>

    </tbody>

</table>
