<?php
    require SERVICES."UserService.php";

    $id = basename($_SERVER["REQUEST_URI"]);
    $user = UserService::read((["id" => $id]));

?>



<h2 class="user"><?= $user["Username"] ?></h2>