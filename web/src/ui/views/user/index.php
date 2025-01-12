<?php
require_once SERVICES . "UserService.php";
require_once SERVICES . "RunService.php";
require_once SERVICES . "FollowService.php";

$parts = explode("/", trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/"));

$lastSegment = end($parts);

$isFollowers = ($lastSegment === "followers");
$isFollowing = ($lastSegment === "following");

if ($isFollowers || $isFollowing) {
    array_pop($parts);
    $userId = end($parts);
} else {
    $userId = $lastSegment;
}

$isViewingOwnProfile = false;
if (isset($_SESSION["LOGGED_IN_USER"])) {
    if ($_SESSION["LOGGED_IN_USER"]["UserID"] == $userId) {
        $isViewingOwnProfile = true;
    }
}

$userRes = UserService::read((["id" => $userId]));

if ($userRes["success"]) {
    $user = $userRes["result"];
} else {
    $not_found_message_404 = "User does not exist";
    include VIEWS . "404/index.php";
    return;
}

if ($isFollowers) {
    $followersRes = FollowService::read((["FollowingID" => $userId]));
    $followers = $followersRes["result"];
}
if ($isFollowing) {
    $followingRes = FollowService::read((["FollowerID" => $userId]));
    $following = $followingRes["result"];
}

if (!$isFollowers && !$isFollowing) {
    $runs = RunService::read(["UserID" => $userId])["result"];
}


if (isset($_SESSION["LOGGED_IN_USER"])) {
    $loggedInUserFollowings = FollowService::read(["FollowerID" => $_SESSION["LOGGED_IN_USER"]["UserID"]])["result"];
    $loggedInUserFollowing = false;
    foreach ($loggedInUserFollowings as $loggedInUserFollow) {
        if ($loggedInUserFollow["UserID"] == $userId) {
            $loggedInUserFollowing = true;
        }
    }
}

?>

<div class="user">
    <header class="header">
        <div class="header__banner">
            <a href="/user/<?= $userId ?>" class="header__profile">
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
            </a>
            <?php if (!$isViewingOwnProfile): ?>
                <button
                    class="button button--black <?= $loggedInUserFollowing ? 'button--dangerous' : '' ?>"
                    id="follow-button"
                    onclick="onToggleFollow(<?= $userId ?>)"
                    onmouseover="onFollowButtonHover()"
                    onmouseout="onFollowButtonOut()">
                    <?= $loggedInUserFollowing ? "Following" : "Follow" ?>
                </button>
            <?php endif; ?>
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
    <?php if ($isFollowers): ?>
        <h1>Followers</h1>
        <div class="relations">
            <?php foreach ($followers as $user): ?>
                <a class="user-badge" href="/user/<?= $user["UserID"] ?>">
                    <img class="user-badge__avatar" src="/assets/pfp/<?= $user["ProfilePictureIndex"] ?>.png">
                    <div class="user-badge__metadata">
                        <div class="user-badge__username">
                            <?= $user["Username"] ?>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

    <?php elseif ($isFollowing): ?>
        <h1>Following</h1>
        <div class="relations">
            <?php foreach ($following as $user): ?>
                <a class="user-badge" href="/user/<?= $user["UserID"] ?>">
                    <img class="user-badge__avatar" src="/assets/pfp/<?= $user["ProfilePictureIndex"] ?>.png">
                    <div class="user-badge__metadata">
                        <div class="user-badge__username">
                            <?= $user["Username"] ?>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

    <?php else: ?>
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
            foreach ($runs as $run) {
                $LOGGED_IN_USER = isset($LOGGED_IN_USER) ? $LOGGED_IN_USER : null;
                include COMPONENTS . "runCard.php";
            }
            ?>
        </div>
    <?php endif; ?>
</div>