import ApiClient from "../api/ApiClient.js";
import RunsClient from "../api/RunsClient.js"

class FormHandler
{
    static addForm(formId, callback)
    {
        const form = document.getElementById(formId)
        if (form)
            form.addEventListener("submit", callback)
    }
}

FormHandler.addForm("new-run-form", event => {
    event.preventDefault();
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
    new RunsClient().createRun(data)
})

FormHandler.addForm("login-form", event => {
    event.preventDefault();
    new ApiClient().POST("login", {})
})