import ApiClient from "../api/ApiClient.js"
import Skeleton from "./skeleton.js"
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
                const runs = document.querySelector(".runs")
                const runElement = document.querySelector(".runs__card")
                let height = runElement ? getComputedStyle(runElement).height : "200px"
                runs.innerHTML = Array(5).fill().map(() => Skeleton.fromParams("100%", height).outerHTML).join('')


                setTimeout(async () =>
                {
                    let client = new ApiClient()

                    let response;
                    if (sectionId == "new")
                    {
                        response = await client.PARTIAL("runs", { orderBy: "RUNS.SubmittedAt" })
                    } else if (sectionId == "highscore")
                    {
                        response = await client.PARTIAL("runs", { orderBy: "RUNS.BestHand" })
                    } else if (sectionId == "ante")
                    {
                        response = await client.PARTIAL("runs", { orderBy: "RUNS.Ante" })
                    }
                    runs.innerHTML = await response.text();
                }, 900)
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
