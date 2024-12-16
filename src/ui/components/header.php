<header class="header">
    <div class="header__section">
        <a href="/">
            <img class="header__section__logo" src="/assets/logo.png">
        </a>
        <a href="/">
            <p class="header__logo-text">Balatro Runs</p>
        </a>
        <p><?= isset($_SESSION["Name"]) ? $_SESSION["Name"] : "" ?></p>
        <a href="/"><button>Runs</button></a>
        <a href="/new"><button>Submit</button></a>
    </div>
    <div class="header__section">
        <a href="/login">
            <button class="button--black">Log In</button>
        </a>
        <a href="/signup">
            <button class="button--black">Create Account</button>
        </a>
<!--         <div class="user-badge">
            <img src="/assets/logoAlternate.webp" class="user-badge__avatar">
            <span class="user-badge__name">nozzelozze</span>
        </div> -->
    </div>
</header>