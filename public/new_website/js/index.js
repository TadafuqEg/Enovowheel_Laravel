
// sticky navbar

let nav = document.querySelector("nav");
window.onscroll = function () {
    if (document.documentElement.scrollTop > 20) {
        nav.classList.add("sticky");
    } else {
        nav.classList.remove("sticky");
    }
}

// responsive menu buttton

const menuBtn = document.querySelector(".menu-icon span");
// const searchBtn = document.querySelector(".search-icon");
const cancelBtn = document.querySelector(".cancel-icon");
const items = document.querySelector(".nav-items");
const item1 = document.querySelector(".n-item-1")
const item2 = document.querySelector(".n-item-3")
const item3 = document.querySelector(".n-item-4")
const form = document.querySelector("form");
menuBtn.onclick = () => {
    items.classList.add("active");
    menuBtn.classList.add("hide");
    // searchBtn.classList.add("hide");
    cancelBtn.classList.add("show");
}
cancelBtn.onclick = () => {
    items.classList.remove("active");
    menuBtn.classList.remove("hide");
    // searchBtn.classList.remove("hide");
    cancelBtn.classList.remove("show");
    form.classList.remove("active");
    cancelBtn.style.color = "#E70013";
}
item1.onclick = () => {
    items.classList.remove("active");
    menuBtn.classList.remove("hide");
    // searchBtn.classList.remove("hide");
    cancelBtn.classList.remove("show");
    form.classList.remove("active");
    cancelBtn.style.color = "#E70013";
    console.log("test")
}


item3.onclick = () => {
    items.classList.remove("active");
    menuBtn.classList.remove("hide");
    // searchBtn.classList.remove("hide");
    cancelBtn.classList.remove("show");
    form.classList.remove("active");
    cancelBtn.style.color = "#E70013";
    console.log("test")
}


// counter
document.addEventListener("DOMContentLoaded", function () {
    const counterElement = document.getElementById("counter");
    const incrementBtn = document.getElementById("incrementBtn");
    const decrementBtn = document.getElementById("decrementBtn");

    let counter = 0;

    incrementBtn.addEventListener("click", function () {
        counter++;
        counterElement.textContent = counter;
    });

    decrementBtn.addEventListener("click", function () {
        counter--;
        counterElement.textContent = counter;
    });
});

