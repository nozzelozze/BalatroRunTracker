import ApiClient from "../api/ApiClient.js";



const onRemoveRun = async (runId) =>
{
    let client = new ApiClient()
    let res = await client.DELETE("runs/" + runId)

    if (res.ok)
    {
        document.getElementById("run-"+runId).remove();
    }
}
window.onRemoveRun = onRemoveRun;