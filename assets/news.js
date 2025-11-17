const newsBar = document.getElementById("newsBar");
const mainHeader = document.querySelector("header.main-header");

window.addEventListener("scroll", () => {
    if (window.scrollY > 0) {
        newsBar.classList.add("hidden");
        mainHeader.classList.remove("shifted");
    } else {
        newsBar.classList.remove("hidden");
        mainHeader.classList.add("shifted");
    }
});
