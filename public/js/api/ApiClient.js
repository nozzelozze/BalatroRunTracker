import config from ".././dev/config.js"

class ApiClient
{

    async POST(path, data)
    {
        const res = await fetch(config.API_URL + path, {
            method: "POST",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        })
        return res
    }

    async GET(path, params)
    {
        params = new URLSearchParams(params).toString()
        const res = await fetch(`${config.API_URL}${path}?${params}`, {
            method: "GET",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json"
            }
        })
        return res
    }

    async DELETE(path)
    {
        const res = await fetch(`${config.API_URL}${path}`, {
            method: "DELETE",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json"
            }
        })
        return res
    }
}

export default ApiClient