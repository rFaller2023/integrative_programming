<?php

include './model/user.php';

$user = new User();
$data = $user->getAll($_GET);

echo json_encode($data);

?>