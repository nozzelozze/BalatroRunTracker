<?php
require SERVICES . "RunService.php";
$runs = RunService::read();
?>

<div class="runs">
    <?php
    foreach ($runs as $run)
    {
        include COMPONENTS."runCard.php";
    }
    ?>
</div>