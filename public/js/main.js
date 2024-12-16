import "./events/forms.js";
import "./events/buttonCallbacks.js"
import ApiClient from "./api/ApiClient.js";


const submit = () =>
{

}

window.submit = submit



const logout = () =>
{
    new ApiClient().GET("logout", {})
}

window.logout = logout;