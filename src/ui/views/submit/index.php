<div class="form-screen">
    <form class="form-screen__form" id="submit-run-form">
        <div class="form-screen__title form-screen__title--align-start">
            Submit Run
        </div>

        <div class="form-screen__inputs">
        <label class="form-screen__label" for="RunName">Run Name</label>
        <input class="form-screen__input" type="text" name="RunName" id="RunName" required />

        <label class="form-screen__label" for="RunDescription">Run Description</label>
        <input class="form-screen__input" type="text" name="RunDescription" id="RunDescription" required />

        <label class="form-screen__label" for="BestHand">Best Hand</label>
        <input class="form-screen__input" type="number" name="BestHand" id="BestHand" required min="0" step="1" />

        <label class="form-screen__label" for="MostPlayedHand">Most Played Hand</label>
        <input class="form-screen__input" type="text" name="MostPlayedHand" id="MostPlayedHand" required />

        <label class="form-screen__label" for="CardsPlayed">Cards Played</label>
        <input class="form-screen__input" type="number" name="CardsPlayed" id="CardsPlayed" required min="0" step="1" />

        <label class="form-screen__label" for="CardsDiscarded">Cards Discarded</label>
        <input class="form-screen__input" type="number" name="CardsDiscarded" id="CardsDiscarded" required min="0" step="1" />

        <label class="form-screen__label" for="CardsPurchased">Cards Purchased</label>
        <input class="form-screen__input" type="number" name="CardsPurchased" id="CardsPurchased" required min="0" step="1" />

        <label class="form-screen__label" for="TimesRerolled">Times Rerolled</label>
        <input class="form-screen__input" type="number" name="TimesRerolled" id="TimesRerolled" required min="0" step="1" />

        <label class="form-screen__label" for="Seed">Seed</label>
        <input class="form-screen__input" type="text" name="Seed" id="Seed" required />

        <label class="form-screen__label" for="Ante">Ante</label>
        <input class="form-screen__input" type="number" name="Ante" id="Ante" required min="0" step="1" />

        <label class="form-screen__label" for="Round">Round</label>
        <input class="form-screen__input" type="number" name="Round" id="Round" required min="0" step="1" />

        <label class="form-screen__label" for="DefeatedBy">Defeated By</label>
        <input class="form-screen__input" type="text" name="DefeatedBy" id="DefeatedBy" required />
        </div>

        <button class="button form-screen__input button--blue" type="submit">
            Submit Run
            <span class="loader loader--hide"></span>
        </button>
    </form>
</div>
