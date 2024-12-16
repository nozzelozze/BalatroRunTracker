<?php
    require SERVICES."RunService.php";
    require SERVICES."CommentService.php";

    $runId = basename($_SERVER["REQUEST_URI"]);
    $run = RunService::read(["RunID" => $runId]);
    $comments = CommentService::read(["RunID" => $runId]);

?>

<h2><?= $run["RunID"] ?></h2>
<a href="/user/<?= $run["UserID"] ?>">
    <h2><?= $run["Username"] ?> (clickable)</h2>
</a>
<h2><?= $run["Score"] ?></h2>
<h2><?= $run["SubmittedAt"] ?></h2>

<h2>Comments</h2>
<div class="comments">
    <?php
    foreach ($comments as $comment)
    {
        include COMPONENTS."comment.php";
    }
    ?>
</div>