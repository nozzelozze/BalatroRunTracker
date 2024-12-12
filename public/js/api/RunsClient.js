import ApiClient from "./ApiClient.js";



class RunsClient
{

    createRun(data)
    {
        let client = new ApiClient()

        client.POST("runs", data)
    }

}

export default RunsClient;