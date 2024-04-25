<?php
include '../controller/UserController.php';

$new = new UserController();
echo $new->loginController();

?>