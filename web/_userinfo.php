<table class="table" style="width: 100%; margin: auto; border: 1px solid black; box-shadow: 5px 5px cadetblue; border-radius: 5px;">
    <thead>

    <?php
    if (!empty($_SESSION['imsg'])){
        ?>
            <tr >
                <th style="text-align: center; background-color: green;color: white;"  colspan="2">

            <?php echo $_SESSION['imsg']; unset($_SESSION['imsg']); ?>

                </th>
            </tr>
        <?php

    }

    ?>
    <tr>
        <th style="text-align: center" colspan="2">Information</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Name</td>
        <td><?php echo $user[0]['name']; ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo $user[0]['email']; ?></td>
    </tr>
    <tr>
        <td>Mobile</td>
        <td><?php echo $user[0]['phone']; ?></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><?php echo $user[0]['password']; ?></td>
    </tr>


    <tr>
        <td>Image</td>
        <td><?php
            $image='empty.png';
            if (!empty($user[0]['image']) && file_exists('image/'.$user[0]['image'])){
            $image=$user[0]['image'];
            } ?>
        <img src="<?='image/'.$image?>" style="width: 180px ; height: 200px;">

        </td>
    </tr>
    <tr>

        <td colspan="2" style="text-align: center;"><a class="btn btn-success btn-sm" href="profile?action=edit">Edit</a></td>
    </tr>
    </tbody>

</table>
