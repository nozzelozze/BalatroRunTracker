<?php
require SERVICES . "RunService.php";
$newRuns = RunService::read(["orderBy" => "RUNS.SubmittedAt"]);
$highScoreRuns = RunService::read(["orderBy" => "RUNS.Score"]);
?>

<h2>New runs</h2>
<div class="runs">
    <?php
    foreach ($newRuns as $run)
    {
        include COMPONENTS."runCard.php";
    }
    ?>
</div>
<h2>Highests scoring runs</h2>
<div class="runs">
    <?php
    foreach ($highScoreRuns as $run)
    {
        include COMPONENTS."runCard.php";
    }
    ?>
</div>