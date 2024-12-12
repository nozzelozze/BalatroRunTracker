import RunsClient from "./api/RunsClient.js"

function handleSubmit(event)
{
    event.preventDefault();
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
    new RunsClient().createRun(data)
}

const form = document.getElementById("submit-form")
form.addEventListener("submit", handleSubmit)