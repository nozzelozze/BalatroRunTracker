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
        "RunID": runId,
        "Content": content
    })

    if (res.ok)
    {
        let partialRes = await client.PARTIAL("comments", {"CommentID": (await res.json()).result.CommentID})

        let tempDiv = document.createElement("div");
        tempDiv.innerHTML = await partialRes.text();
        let commentsElement = document.querySelector(".run__comments__list");
        commentsElement.insertBefore(tempDiv.firstElementChild, commentsElement.firstChild);
        document.getElementById("comment-input").value = "";
        
    } else
    {
        showSnackbar("Something went wrong...")
    }
}
window.onComment = onComment;