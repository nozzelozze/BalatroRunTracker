import ApiClient from "../api/ApiClient.js";
import showSnackbar from "../ui/snackbar.js";


const onRemoveRun = async (runId) =>
{
    let client = new ApiClient()
    let res = await client.DELETE("runs/" + runId)

    if (res.ok)
    {
        document.getElementById("run-" + runId).remove();
    }
}
window.onRemoveRun = onRemoveRun;



const onComment = async (runId, userId, username) =>
{
    let client = new ApiClient()


    let content = document.getElementById("comment-input").value

    if (!content)
    {
        showSnackbar("Can't post empty comment...")
        return
    }

    let res = await client.POST("comments", {
        "RunID": "runId",
        "Content": content
    })

    if (res.ok)
    {
        let commentElement = document.createElement("div");
        commentElement.classList.add("run__comments__comment");

        commentElement.innerHTML = `
            <a class="user-badge" href="/user/${userId}">
                <img class="user-badge__avatar" src="/assets/logo.png">
                <div class="user-badge__metadata">
                    <div class="user-badge__username">
                        ${username}
                    </div>
                    <div class="user-badge__date">
                        Commented just now
                    </div>
                </div>
            </a>
            <div class="run__comments__comment__content">
                ${content}
            </div>
        `;
        document.querySelector(".run__comments__list").appendChild(commentElement);
        document.getElementById("comment-input").value = "";
    }
}
window.onComment = onComment;