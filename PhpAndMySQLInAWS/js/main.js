jQuery(document).ready(function( $ ) {

    var menu = document.getElementById("nav-menu");
    var menuItems = menu.getElementsByClassName("menu-item");
    for (var i = 0; i < menuItems.length; i++) {
        menuItems[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
});