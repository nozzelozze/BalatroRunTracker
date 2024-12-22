


export class Snackbar
{
    static show(message)
    {
        var snackbar = document.getElementById("snackbar");
        snackbar.textContent = message;
        snackbar.className = "snackbar snackbar--show";
        setTimeout(() => snackbar.className = "snackbar", 2800);
    }
}

export class Skeleton extends HTMLDivElement
{

    static fromParams(width, height)
    {
        let skeleton = document.createElement("div");
        skeleton.style.width = width;
        skeleton.style.height = height;
        skeleton.className = "skeleton";
        return skeleton;
    }

}