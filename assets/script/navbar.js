function handleSize() {
    const navbtn = document.querySelector(".navbtntoggle");
    const desktopNav = document.querySelector(".nav");

    const winSize = window.innerWidth;

    if (winSize <= 700) {
        navbtn.style.display = "flex";
        desktopNav.style.display = "none";
    } else {
        navbtn.style.display = "none";
        desktopNav.style.display = "flex";
    }
}

document.addEventListener("DOMContentLoaded", function () {
    handleSize();
    window.addEventListener("resize", handleSize);
});
