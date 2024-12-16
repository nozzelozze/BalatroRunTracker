<?php
    require SERVICES."UserService.php";
    require SERVICES."RunService.php";

    $userId = basename($_SERVER["REQUEST_URI"]);
    $user = UserService::read((["id" => $userId]));
    $runs = RunService::read(["UserID" => $userId])

?>



<h2 class="user"><?= $user["Username"] ?></h2>
<div class="runs">
    <?php
        foreach ($runs as $run)
        {
            include COMPONENTS."runCard.php";
        }
    ?>
</div>