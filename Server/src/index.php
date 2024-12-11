<?php

ob_start();

require "./Services/DBService.php";
$result = DBService::getInstance()->getUsers();

foreach ($result as $user)
{
    include "./components/userCard.php";
}

$content = ob_get_clean();
include "layout.php";

?>