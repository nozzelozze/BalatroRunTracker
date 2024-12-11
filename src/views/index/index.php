<?php
    require SERVICES."RunService.php";

    $result = RunService::get();

    foreach ($result as $r)
    {
        echo $r;
    }
?>

<button onclick="submit();">
    Test API
</button>

<div class="runs">
    <?php include COMPONENTS."runCard.php" ?>
    <?php include COMPONENTS."runCard.php" ?>
    <?php include COMPONENTS."runCard.php" ?>
</div>
