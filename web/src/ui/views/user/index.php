<?php
require_once SERVICES . "UserService.php";
require_once SERVICES . "RunService.php";

$userId = basename($_SERVER["REQUEST_URI"]);

$userRes = UserService::read((["id" => $userId]));

if ($userRes["success"])
{
    $user = $userRes["result"];
} else
{
    $not_found_message_404 = "User does not exist";
    include VIEWS."404/index.php";
    return;
}


$runs = RunService::read(["UserID" => $userId])["result"];
?>



<div class="user">
    <header class="header">
        <div class="header__banner">
            <div class="header__avatar">
                <img src="/assets/pfp/<?= $user["ProfilePictureIndex"] ?>.png" />
            </div>
            <div class="header__info">
                <div class="header__username">
                    <?= $user["Username"] ?>
                </div>
                <div class="header__joined">
                    Joined <?= date('F Y', strtotime($user["CreatedAt"])) ?>
                </div>
            </div>
        </div>
        <div class="header__user-relationships">
            <a href="/user/<?= $userId ?>/following" class="header__user-relationships__link">
                <?= $user["FollowingCount"] ?> Following
            </a>
            <a href="/user/<?= $userId ?>/followers" class="header__user-relationships__link">
                <?= $user["FollowersCount"] ?> Followers
            </a>
        </div>
    </header>
    <h1>Statistics</h1>
    <div class="statistics">
    <div class="statistics__item">
        <div class="statistics__value"><?= $user["BestHand"] ?></div>
        <div class="statistics__label">Best Hand</div>
    </div>
    <div class="statistics__item">
        <div class="statistics__value"><?= $user["HighestAnte"] ?></div>
        <div class="statistics__label">Highest Ante</div>
    </div>
<!--     <div class="statistics__item">
        <div class="statistics__value"><?= $user["MostUsedJoker"] ?></div>
        <div class="statistics__label">Most Used Joker</div>
    </div> -->
    <div class="statistics__item">
        <div class="statistics__value"><?= $user["RunsCompleted"] ?></div>
        <div class="statistics__label">Runs Completed</div>
    </div>
</div>
    <h1>Runs</h1>
    <div class="runs">
        <?php
         foreach ($runs as $run)
         {
            $LOGGED_IN_USER = isset($LOGGED_IN_USER) ? $LOGGED_IN_USER : null;
            include COMPONENTS . "runCard.php";
        }
        ?>
    </div>
</div>