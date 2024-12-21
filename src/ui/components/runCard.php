<div class="runs__card" id="run-<?= $run["RunID"] ?>">
    <a class="runs__card__title" href="/run/<?= $run["RunID"] ?>">
        <?= $run["RunName"] ?>
    </a>
    <div class="runs__card__description">
        <p>
            <?= $run["RunDescription"] ?>
        </p>
    </div>
    <div class="runs__card__bottom">
        <a class="user-badge" href="/user/<?= $run["UserID"] ?>">
            <img class="user-badge__avatar" src="/assets/pfp/<?= $run["ProfilePictureIndex"] ?>.png">
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
        <button class="button button--red runs__card__remove"
            onclick="event.preventDefault(); event.stopPropagation(); onRemoveRun(<?= $run['RunID'] ?>)">Remove</button>
    </div>
</div>