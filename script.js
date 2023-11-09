let hamburger = document.querySelector("#hamburger");
let navbar = document.querySelector("#links");
let turnedOn = false;

hamburger.addEventListener("click", function() {
    if (!turnedOn) {
        navbar.style.display = "flex";
        hamburger.src = "img/cross.jpg";
    } else {
        navbar.style.display = "";
        hamburger.src = "img/hamburger.png"
    }

    turnedOn = !turnedOn
});