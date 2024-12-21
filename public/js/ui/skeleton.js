


class Skeleton extends HTMLDivElement
{


    static fromParams(width, height)
    {
        let skeleton = document.createElement("div");
        skeleton.style.width = width;
        skeleton.style.height = height;
        skeleton.className = "skeleton";
        return skeleton;
    }

    static fromDiv()
    {

    }

}

export default Skeleton