<div class="run__comments__comment">
    <a class="user-badge" href="/user/<?= $comment["UserID"] ?>">
        <img class="user-badge__avatar" src="/assets/logo.png">
        <div class="user-badge__metadata">
            <div class="user-badge__username">
                <?= $comment["Username"] ?>
            </div>
            <div class="user-badge__date">
                Commented
                <?= (date("Y") - date("Y", strtotime($comment["CreatedAt"]))) < 1 ? "less than a year ago" : (date("Y") - date("Y", strtotime($run["CreatedAt"]))) . " years ago" ?>
            </div>
        </div>
    </a>
    <div class="run__comments__comment__content">
        <?= $comment["Content"] ?>
    </div>
</div>