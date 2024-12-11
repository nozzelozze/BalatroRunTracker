import ApiClient from "./api/ApiClient.js"

function submit()
{
    (async () => {
        
        const res = await new ApiClient().GET("runs")
        console.log(res)

    })()
}
window.submit = submit;