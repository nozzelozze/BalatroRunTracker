<?php
include "../src/utils/constants.php";
ob_start();

require SERVICES."UserService.php";
$result = UserService::getUsers();

foreach ($result as $user)
{
    include COMPONENTS . "userCard.php";
}

$content = ob_get_clean();
include ROOT."layout.php";
?>