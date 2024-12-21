import ApiClient from "../api/ApiClient.js";
import { Snackbar, Skeleton } from "../ui/components.js";


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
        Snackbar.show("Can't post empty comment...")
        return
    }

    const comments = document.querySelector(".run__comments__list")
    const commentElement = document.querySelector(".run__comments__comment")
    let height = commentElement ? getComputedStyle(commentElement).height : "50px"
    let skeleton = Skeleton.fromParams("100%", height)
    if (comments.firstChild)
        comments.insertBefore(skeleton, comments.firstChild)
    else
        comments.appendChild(skeleton)


    setTimeout(async () =>
    {
        let res = await client.POST("comments", {
            "RunID": runId,
            "Content": content
        })

        if (res.ok)
        {
            let partialRes = await client.PARTIAL("comments", { "CommentID": (await res.json()).result.CommentID })
            skeleton.remove()
            let tempDiv = document.createElement("div");
            tempDiv.innerHTML = await partialRes.text();
            let commentsElement = document.querySelector(".run__comments__list");
            commentsElement.insertBefore(tempDiv.firstElementChild, commentsElement.firstChild);
            document.getElementById("comment-input").value = "";

        } else
        {
            Snackbar.show("Something went wrong...")
            document.querySelector(".run__comments__list").innerHTML = ""
        }
    }, 900)
}
window.onComment = onComment;