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
            body: data
        })
        const content = await res.json()
        return content
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
        const content = await res.json()
        return content
    }

}

export default ApiClient