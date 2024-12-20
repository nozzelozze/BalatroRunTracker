<?php
require SERVICES . "RunService.php";
$newRuns = RunService::read(["orderBy" => "RUNS.SubmittedAt"])["result"];
?>

<div class="main-page">


    <div class="navigation menu" id="runs-menu">

        <div class="menu__item menu__item--active" data-id="new">
            <div class="menu__icon">
                <i class="fa-solid fa-clock" style="color: #74C0FC;"></i>
            </div>
            <p class="menu__title">New</p>
        </div>

        <div class="menu__item" data-id="highscore">
            <div class="menu__icon">
                <i class="fa-solid fa-fire" style="color: #ff7171;"></i>
            </div>
            <p class="menu__title">Score</p>
        </div>

        <div class="menu__item" data-id="ante">
            <div class="menu__icon">
                <i class="fa-solid fa-map" style="color: #63E6BE;"></i>
            </div>
            <p class="menu__title">Ante</p>
        </div>

    </div>


    <div class="runs">
        <?php
        foreach ($newRuns as $run) {
            include COMPONENTS . "runCard.php";
        }
        ?>
    </div>

    <div class="stats menu" id="jokers-menu">
        <div class="stats__title">Most Played Jokers</div>

        <div class="menu__item">
            <div class="menu__icon">
                <img src="/assets/images/Fortune_Teller.webp">
            </div>
            <p class="menu__title">Fortune Teller</p>
        </div>

        <div class="menu__item">
            <div class="menu__icon">
                <img src="/assets/images/Supernova.webp">
            </div>
            <p class="menu__title">Supernova</p>
        </div>

        <div class="menu__item">
            <div class="menu__icon">
                <img src="/assets/images/Blueprint.webp">
            </div>
            <p class="menu__title">Blueprint</p>
        </div>

        <div class="menu__item">
            <div class="menu__icon">
                <img src="/assets/images/Brainstorm.webp">
            </div>
            <p class="menu__title">Brainstorm</p>
        </div>

        <div class="menu__item">
            <div class="menu__icon">
                <img src="/assets/images/Golden_Joker.webp">
            </div>
            <p class="menu__title">Golden Joker</p>
        </div>

    </div>

</div>