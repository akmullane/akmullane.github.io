const menuItems = document.querySelectorAll("nav ul li a");

menuItems.forEach((item) => {
    item.addEventListener("click", scrollToSection);
});

function scrollToSection(e) {
    e.preventDefault();
    const targetId = e.target.getAttribute("href");
    const targetSection = document.querySelector(targetId);

    if (targetSection) {
        window.scrollTo({
            top: targetSection.offsetTop,
            behavior: "smooth",
        });
    }
}


const menuToggle = document.getElementById("menu-toggle");
const content = document.querySelector(".content");

menuToggle.addEventListener("click", toggleMenu);

function toggleMenu() {
    content.classList.toggle("show-menu");
}
