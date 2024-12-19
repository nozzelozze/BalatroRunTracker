
const menus = document.querySelectorAll(".menu");

menus.forEach(menu =>
{
    const menuItems = menu.querySelectorAll(".menu__item");

    menuItems.forEach(item =>
    {
        item.addEventListener("click", () =>
        {
            menuItems.forEach(el => el.classList.remove("menu__item--active"));

            item.classList.add("menu__item--active");

            const parentMenuId = menu.id;
            const sectionId = item.getAttribute("data-id");

        })
    })
})
