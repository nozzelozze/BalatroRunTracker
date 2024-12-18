<?php
require SERVICES . "RunService.php";
require SERVICES . "CommentService.php";

$runId = basename($_SERVER["REQUEST_URI"]);
$run = RunService::read(["RunID" => $runId]);
$comments = CommentService::read(["RunID" => $runId]);
?>

<div class="run">
    <header class="run__header">
        <h1 class="run__title">The Banana Run</h1>
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
    <div class="run__stats">
        <div class="run__stat">
            <h1 class="run__stat__title">
                Best Hand
            </h1>
            <div class="run__stat__value">
                42,204
            </div>
        </div>
        <div class="run__stat">
            <h1 class="run__stat__title">
                Most Played Hand
            </h1>
            <div class="run__stat__value">
                Two Pair (22)
            </div>
        </div>
        <div class="run__stat">
            <h1 class="run__stat__title">
                Cards Played
            </h1>
            <div class="run__stat__value">
                223
            </div>
        </div>
        <div class="run__stat">
            <h1 class="run__stat__title">
                Ante
            </h1>
            <div class="run__stat__value">
                7
            </div>
        </div>
    </div>

    <!--     <section class="run__comments">
        <h2 class="run__comments-title">Comments</h2>

        <div class="run__comments-input">
            <div class="run__comments-avatar run__comments-avatar--placeholder"></div>
            <input type="text" class="run__comments-text-input" placeholder="Add a public comment..." />
        </div>

        <div class="run__comments-actions">
            <button class="run__comments-cancel">Cancel</button>
            <button class="run__comments-submit">Comment</button>
        </div>

        <div class="run__comments-list">
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <div class="comment__avatar comment__avatar--placeholder"></div>
                    <div class="comment__body">
                        <div class="comment__header">
                            <span class="comment__username"><?= htmlspecialchars($comment["Username"]) ?></span>
                            <span class="comment__time"><?= htmlspecialchars($comment["CreatedAt"]) ?></span>
                        </div>
                        <p class="comment__content"><?= nl2br(htmlspecialchars($comment["Content"])) ?></p>
                        <div class="comment__footer">
                            <button class="comment__action comment__action--like">
                                👍
                            </button>
                            <button class="comment__action comment__action--dislike">
                                👎
                            </button>
                            <button class="comment__action comment__action--reply">Reply</button>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </section> -->

</div>