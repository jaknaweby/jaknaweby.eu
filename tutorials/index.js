let hamburger = document.getElementById("hamburger");
let hamburgerLogo = document.getElementById("hamburger-logo");
let articles = document.getElementById("articles");
let isOn = false;

hamburger.addEventListener("click", () => {
    if (isOn) {
        articles.style = "display: none;";
        hamburgerLogo.style = "";
    } else {
        articles.style = "";
        hamburgerLogo.style = "transform: rotate(-90deg);";
    }

    isOn = !isOn;
});