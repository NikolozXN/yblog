const showButton = document.getElementById("show");
const hideButton = document.getElementById("hide");
const mobileMenu = document.getElementById("mobile-menu-2");
const dropdownButtons = document.querySelectorAll(".dropdownCommentButton");
const dropdownMenus = document.querySelectorAll(".dropdownComment");

let buttons = [showButton, hideButton];

for (let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
        toggleButtons();
    });
}

function toggleButtons() {
    if (mobileMenu.classList.contains("hidden")) {
        hideButton.classList.add("hidden");
        showButton.classList.remove("hidden");
    } else {
        hideButton.classList.remove("hidden");
        showButton.classList.add("hidden");
    }
}

// Function to close all dropdowns
function closeAllDropdowns() {
    dropdownMenus.forEach((menu) => {
        menu.classList.add("hidden");
    });
}

dropdownButtons.forEach((dropdownButton, index) => {
    dropdownButton.addEventListener("click", (event) => {
        // Prevent the click event from propagating to the document
        event.stopPropagation();

        // Toggle the clicked dropdown menu
        dropdownMenus[index].classList.toggle("hidden");

        // Close all other dropdowns
        dropdownMenus.forEach((menu, i) => {
            if (i !== index) {
                menu.classList.add("hidden");
            }
        });
    });
});

// Add a click event listener to the document body to close dropdowns when clicking elsewhere
document.body.addEventListener("click", () => {
    closeAllDropdowns();
});

const hamburgerButton = document.getElementById("hamburger-menu-button");
const closeButton = document.getElementById("close-button");
const sidebar = document.getElementById("default-sidebar");

hamburgerButton.addEventListener("click", () => {
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
