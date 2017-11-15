function openNav() {
    var nav = document.getElementById("myNav");
    if (nav.style.width = "0%"){
        document.getElementById("myNav").style.width = "25%";
    }
}
/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}