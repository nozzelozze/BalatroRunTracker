


const showSnackbar = (message) =>
{
    var snackbar = document.getElementById("snackbar");
    snackbar.textContent = message;
    snackbar.className = "snackbar snackbar--show";
    setTimeout(() => snackbar.className = "snackbar", 2800);
}

export default showSnackbar