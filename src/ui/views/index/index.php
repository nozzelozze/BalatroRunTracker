<?php
require SERVICES . "RunService.php";
$newRuns = RunService::read(["orderBy" => "RUNS.SubmittedAt"]);
?>

<div class="navigation">
    <div class="navigation__item navigation__item--filter">

    </div>
</div>

<div class="runs">
    <?php
    foreach ($newRuns as $run) {
        include COMPONENTS . "runCard.php";
    }
    ?>
</div>

<div class="stats">
    <div class="stats__item stats__item--jokers">

    </div>
</div>