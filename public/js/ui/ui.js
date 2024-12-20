import ApiClient from "../api/ApiClient.js"
import showSnackbar from "./snackbar.js"

const menus = document.querySelectorAll(".menu")

menus.forEach(async menu =>
{
    const menuItems = menu.querySelectorAll(".menu__item")

    menuItems.forEach(async item =>
    {
        item.addEventListener("click", async () =>
        {
            menuItems.forEach(el => el.classList.remove("menu__item--active"))

            item.classList.add("menu__item--active")

            const parentMenuId = menu.id
            const sectionId = item.getAttribute("data-id")

            if (parentMenuId == "runs-menu")
            {
                let client = new ApiClient()

                let response;
                if (sectionId == "new")
                {
                    response = await client.PARTIAL("runs", { orderBy: "RUNS.SubmittedAt" })
                } else if (sectionId == "highscore")
                {
                    response = await client.PARTIAL("runs", { orderBy: "RUNS.Score" })
                } else if (sectionId == "ante")
                {
                    response = await client.PARTIAL("runs", { orderBy: "RUNS.Ante" })
                }
                const runs = document.querySelector(".runs");
                runs.innerHTML = await response.text();
            }

        })
    })
})


const input = document.getElementById("comment-input");

input?.addEventListener("keypress", function (event)
{
    if (event.key === "Enter")
    {
        event.preventDefault();
        const commentButton = document.getElementById("comment-button");

        commentButton?.click();

        input.blur();
    }
});
