<?php
    require SERVICES."RunService.php";

    $runId = basename($_SERVER["REQUEST_URI"]);
    $run = RunService::read(["RunID" => $runId])

?>

<h2><?= $run["RunID"] ?></h2>
<a href="/user/<?= $run["UserID"] ?>">
    <h2><?= $run["Username"] ?> (clickable)</h2>
</a>
<h2><?= $run["Score"] ?></h2>
<h2><?= $run["SubmittedAt"] ?></h2>