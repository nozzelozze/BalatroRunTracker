<?php
require SERVICES . "RunService.php";
require SERVICES . "CommentService.php";

$runId = basename($_SERVER["REQUEST_URI"]);
$runRes = RunService::read(["RunID" => $runId]);

if ($runRes["success"])
{
    $run = $runRes["result"];
} else
{
    $not_found_message_404 = "Run does not exist";
    include VIEWS."404/index.php";
    return;
}

$comments = CommentService::read(["RunID" => $runId])["result"];
?>

<div class="run">
    <header class="run__header">
        <div class="run__title"><?= $run["RunName"] ?></div>
        <a class="user-badge" href="/user/<?= $run["UserID"] ?>">
            <img class="user-badge__avatar" src="/assets/logo.png">
            <div class="user-badge__metadata">
                <div class="user-badge__username">
                    <?= $run["Username"] ?>
                </div>
                <div class="user-badge__date">
                    Submitted
                    <?= (date("Y") - date("Y", strtotime($run["SubmittedAt"]))) < 1 ? "less than a year ago" : (date("Y") - date("Y", strtotime($run["SubmittedAt"]))) . " years ago" ?>
                </div>
            </div>
        </a>
    </header>
    <div class="run__description">
        <?= $run["RunDescription"] ?>
    </div>
    <div class="run__stats">
        <div class="run__stat">
            <h1 class="run__stat__title">
                Best Hand
            </h1>
            <div class="run__stat__value">
                <?= $run["BestHand"] ?>
            </div>
        </div>
        <div class="run__stat">
            <h1 class="run__stat__title">
                Most Played Hand
            </h1>
            <div class="run__stat__value">
                <?= $run["MostPlayedHand"] ?>
            </div>
        </div>
        <div class="run__stat">
            <h1 class="run__stat__title">
                Cards Played
            </h1>
            <div class="run__stat__value">
                <?= $run["CardsPlayed"] ?>
            </div>
        </div>
        <div class="run__stat">
            <h1 class="run__stat__title">
                Ante
            </h1>
            <div class="run__stat__value">
                <?= $run["Ante"] ?>
            </div>
        </div>
    </div>

    <div class="run__comments">
        <h2 class="run__comments__title">Comments</h2>

        <div class="run__comments__input">
            <img class="run__comments__avatar" src="/assets/logo.png">
            <input type="text" class="run__comments__text-input" id="comment-input" placeholder="Add comment..." />
            <button class="button" id="comment-button" onclick="onComment(<?= $run['RunID'] ?>, <?= $run['UserID'] ?>, '<?= $run['Username'] ?>')">Comment</button>
        </div>

        <div class="run__comments__list">
            <?php foreach ($comments as $comment): ?>
                <?php include COMPONENTS."comment.php"; ?>
            <?php endforeach; ?>
        </div>
    </div>

</div>