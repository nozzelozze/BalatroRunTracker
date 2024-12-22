<header class="header">
    <div class="header__section">
        <a href="/">
            <img class="header__section__logo" src="/assets/logo.png">
        </a>
        <a href="/">
            <p class="header__logo-text">Balatro Runs</p>
        </a>
        <a href="/" class="button button--black header__button">
            <i class="fa-solid fa-house"></i>
            <span>Home</span>
        </a>
        <a href="/submit" class="button button--black header__button">
            <i class="fa-solid fa-plus"></i>
            <span>Submit</span>
        </a>
    </div>
    <div class="header__section">
        <?php if (isset($_SESSION["LOGGED_IN_USER"])): ?>
            <a class="user-badge" href="/user/<?= $_SESSION["LOGGED_IN_USER"]["UserID"] ?>">
                <img src="/assets/pfp/<?= $_SESSION["LOGGED_IN_USER"]["ProfilePictureIndex"] ?>.png"
                class="user-badge__avatar">
                <span class="user-badge__name"><?= $_SESSION["LOGGED_IN_USER"]["Username"] ?></span>
            </a>
            <a href="/logout" class="button button--black header__button">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
            </a>
        <?php else: ?>
            <a href="/login" class="button button--black header__button">
                <i class="fa-solid fa-right-to-bracket"></i>
                <span>Log In</span>
            </a>
            <a href="/signup" class="button button--black header__button">
                <i class="fa-solid fa-user-plus"></i>
                <span>Create Account</span>
            </a>
        <?php endif; ?>
    </div>
</header>