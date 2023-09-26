const hamburgerButton = document.getElementById("hamburger-menu-button");
const closeButton = document.getElementById("close-button");
const sidebar = document.getElementById("default-sidebar");

hamburgerButton.addEventListener("click", () => {
    sidebar.classList.toggle("-translate-x-full"); // Toggle sidebar visibility
    toggler();
});

closeButton.addEventListener("click", () => {
    sidebar.classList.toggle("-translate-x-full"); // Toggle sidebar visibility
    toggler();
});

function toggler() {
    if (sidebar.classList.contains("-translate-x-full")) {
        hamburgerButton.classList.remove("hidden");
        closeButton.classList.add("hidden");
    } else {
        hamburgerButton.classList.add("hidden");
        closeButton.classList.remove("hidden");
    }
}
