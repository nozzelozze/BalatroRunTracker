import ApiClient from "../api/ApiClient.js";
import { Snackbar } from "../ui/components.js";

class FormHandler
{
    static addForm(formId, callback)
    {
        const form = document.getElementById(formId)
        if (form)
            form.addEventListener("submit", callback)
    }
}

FormHandler.addForm("submit-run-form", event =>
{
    event.preventDefault()
    const formData = new FormData(event.target)
    const data = Object.fromEntries(formData.entries())
    data["UserID"] = 1;

    const loader = document.querySelector(".loader")
    if (loader)
    {
        loader.className = "loader"
    }


    setTimeout(async () =>
    {
        const client = new ApiClient()
        let response = await client.POST("runs", data)
        let responseData = await response.json()
        if (loader)
        {
            loader.className = "loader loader--hide"
        }
        if (response.ok)
        {
            window.location.href = "/run/" + responseData.result
        } else
        {
            Snackbar.show("Something went wrong: " + responseData.error)
        }
    }, 500)
})

FormHandler.addForm("login-form", event =>
{
    event.preventDefault();
    new ApiClient().POST("login", {})
})