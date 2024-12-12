<?php
require SERVICES . "RunService.php";
$runs = RunService::read();
?>

<button onclick="submit();">
    Test API
</button>

<div class="runs">
    <?php
    foreach ($runs as $run)
    {
        include COMPONENTS."runCard.php";
    }
    ?>
</div>