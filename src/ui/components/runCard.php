<div class="runs__card" id="run-<?= $run["RunID"] ?>" style="cursor: pointer;" onclick="
    if (!event.target.closest('.runs__card__remove, .user-badge')) {
        window.location.href = '/run/<?= $run["RunID"] ?>';
    }
    ">
    <div class="runs__card__title">
        <?= $run["RunName"] ?>
    </div>

    <div class="runs__card__description">
        <p><?= $run["RunDescription"] ?></p>
    </div>

    <div class="runs__card__bottom">
        <!-- User badge stays a valid link, but clicking it won’t trigger navigation to the run -->
        <a class="user-badge" href="/user/<?= $run["UserID"] ?>">
            <img class="user-badge__avatar" src="/assets/pfp/<?= $run["ProfilePictureIndex"] ?>.png">
            <div class="user-badge__metadata">
                <div class="user-badge__username">
                    <?= $run["Username"] ?>
                </div>
                <div class="user-badge__date">
                    Submitted
                    <?= (date("Y") - date("Y", strtotime($run["SubmittedAt"]))) < 1
                        ? "less than a year ago"
                        : (date("Y") - date("Y", strtotime($run["SubmittedAt"]))) . " years ago" ?>
                </div>
            </div>
        </a>

        <button class="button button--red runs__card__remove" onclick="
              event.preventDefault();
              event.stopPropagation();
              onRemoveRun(<?= $run['RunID'] ?>);
            ">
            Remove
        </button>
    </div>
</div>