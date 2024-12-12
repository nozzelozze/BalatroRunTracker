<?php
    require SERVICES."RunService.php";

    $result = RunService::read(["id" => 1]);

    echo $result["Score"];
?>

<button onclick="submit();">
    Test API
</button>

<div class="runs">
    <?php include COMPONENTS."runCard.php" ?>
    <?php include COMPONENTS."runCard.php" ?>
    <?php include COMPONENTS."runCard.php" ?>
</div>
