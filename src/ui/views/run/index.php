<?php
require SERVICES . "RunService.php";
require SERVICES . "CommentService.php";

$runId = basename($_SERVER["REQUEST_URI"]);
$run = RunService::read(["RunID" => $runId]);
$comments = CommentService::read(["RunID" => $runId]);
?>

<article class="run-page">
    <header class="run-page__header">
        <h1 class="run-page__title">Run #<?= htmlspecialchars($run["RunID"]) ?></h1>
        <div class="run-page__metadata">
            <a href="/user/<?= htmlspecialchars($run["UserID"]) ?>" class="run-page__user-link">
                <span class="run-page__username"><?= htmlspecialchars($run["Username"]) ?></span>
            </a>
            <span class="run-page__score">Score: <?= htmlspecialchars($run["Score"]) ?></span>
            <time datetime="<?= htmlspecialchars($run["SubmittedAt"]) ?>"
                class="run-page__submitted-at"><?= htmlspecialchars($run["SubmittedAt"]) ?></time>
        </div>
    </header>

<!--     <section class="run-page__comments">
        <h2 class="run-page__comments-title">Comments</h2>

        <div class="run-page__comments-input">
            <div class="run-page__comments-avatar run-page__comments-avatar--placeholder"></div>
            <input type="text" class="run-page__comments-text-input" placeholder="Add a public comment..." />
        </div>

        <div class="run-page__comments-actions">
            <button class="run-page__comments-cancel">Cancel</button>
            <button class="run-page__comments-submit">Comment</button>
        </div>

        <div class="run-page__comments-list">
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

</article>