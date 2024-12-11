<?php

ob_start();

require "./Services/UserService.php";
$result = UserService::getUsers();

foreach ($result as $user)
{
    include "./components/userCard.php";
}

$content = ob_get_clean();
include "layout.php";

?>