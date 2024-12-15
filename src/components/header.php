<header class="header">
    <div class="header__section">
        <a href="/">
            <p>Balatro Runs</p>
        </a>
        <p><?= isset($_SESSION["Name"]) ? $_SESSION["Name"] : "" ?></p>
        <a href="/"><button>Existing runs</button></a>
        <a href="/new"><button>Submit run</button></a>
    </div>
    <div class="header__section">
            <button onclick="logout()">Log out</button>
        <a href="/login">
            <button>Log In</button>
        </a>
        <a href="/signup">
            <button>Sign Up</button>
        </a>
    </div>
</header>