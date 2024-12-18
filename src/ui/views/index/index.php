<?php
require SERVICES . "RunService.php";
$newRuns = RunService::read(["orderBy" => "RUNS.SubmittedAt"]);
?>

<div class="main-page">

    <div class="navigation">
        <div class="navigation__item navigation__item--filter">
            <div class="menu" id="menu">

                <div class="menu__item menu__item--active" data-id="new">
                    <div class="menu__icon">
                        <i class="fa-solid fa-clock" style="color: #74C0FC;"></i>
                    </div>
                    <p class="menu__title">New Runs</p>
                </div>

                <div class="menu__item" data-id="highscore">
                    <div class="menu__icon">
                        <i class="fa-solid fa-fire" style="color: #ff7171;"></i>
                    </div>
                    <p class="menu__title">Highscore Runs</p>
                </div>

            </div>

        </div>
    </div>

    <div class="runs">
        <?php
        foreach ($newRuns as $run) {
            include COMPONENTS . "runCard.php";
        }
        ?>
    </div>

    <div class="stats">

        <div class="stats__item">
            <h2>Most Played Jokers</h2>
            <div class="menu" id="menu">

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
    </div>

</div>