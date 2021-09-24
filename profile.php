<?php
ob_start();
session_start()


?>


<div class="container">






</div>



<?php


$main_content=ob_get_contents();
ob_end_clean();
include ("web/_layout.php");

?>
