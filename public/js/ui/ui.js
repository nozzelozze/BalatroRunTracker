


const menuItems = document.querySelectorAll(".menu__item");

menuItems.forEach(item =>
{
    item.addEventListener("click", () =>
    {

        menuItems.forEach(el => el.classList.remove("menu__item--active"));

        item.classList.add("menu__item--active");

        const section = item.getAttribute("data-id");
    });
});