<?php 
    ob_start() ;
?>

<h1>Home page</h1>


<?php
$title = "Home";
$content = ob_get_clean();

require_once "template.php";