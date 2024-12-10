<?php
    require "./Services/DBService.php";
    $result = DBService::getInstance()->getUsers();

    foreach ($result as $user) {
        include "./Components/Usercard.php";
    }

?>