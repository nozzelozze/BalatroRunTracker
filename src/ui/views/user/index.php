<?php
require SERVICES . "UserService.php";
require SERVICES . "RunService.php";

$userId = basename($_SERVER["REQUEST_URI"]);
$user = UserService::read((["id" => $userId]));
$runs = RunService::read(["UserID" => $userId]);

?>



<div class="user">
    <header class="header">
        <div class="header__banner">
            <div class="header__avatar">
                <img src="/assets/logo.png" />
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
    </header>
    <h1>Statistics</h1>
    <div class="statistics">
    <div class="statistics__item">
        <div class="statistics__value">1.077e</div>
        <div class="statistics__label">Highest Score</div>
    </div>
    <div class="statistics__item">
        <div class="statistics__value">14</div>
        <div class="statistics__label">Highest Ante</div>
    </div>
    <div class="statistics__item">
        <div class="statistics__value"><img src="/assets/images/Fortune_Teller.webp"></div>
        <div class="statistics__label">Most Used Joker</div>
    </div>
    <div class="statistics__item">
        <div class="statistics__value">42</div>
        <div class="statistics__label">Runs Completed</div>
    </div>
</div>
    <h1>Runs</h1>
    <div class="runs">
        <?php
        foreach ($runs as $run) {
            include COMPONENTS . "runCard.php";
        }
        ?>
    </div>
</div>