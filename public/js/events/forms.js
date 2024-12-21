import ApiClient from "../api/ApiClient.js";

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
    new ApiClient().POST("runs", data)
})

FormHandler.addForm("login-form", event =>
{
    event.preventDefault();
    new ApiClient().POST("login", {})
})