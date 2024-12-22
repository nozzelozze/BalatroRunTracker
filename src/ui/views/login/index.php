<div class="form-screen">
    <form class="form-screen__form" id="login-form">
        <div class="form-screen__title">
            Login
        </div>
        <input class="form-screen__input" required type="text" name="Username" id="Username" placeholder="Username" />
        <input class="form-screen__input" required type="password" name="Password" id="Password" placeholder="Password" />

        <button class="button form-screen__input button--green" type="submit">
            Login
            <span class="loader loader--hide"></span>
        </button>
    </form>
    <a class="form-screen__tip" href="/signup">
        or, signup
    </a>
    <a class="form-screen__tip form-screen__tip--error" href="/signup">
        
    </a>
</div>