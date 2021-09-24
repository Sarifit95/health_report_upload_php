<?php
ob_start();

?>






<?php


$main_content=ob_get_contents();
ob_end_clean();
include ("web/_layout.php");

?>
