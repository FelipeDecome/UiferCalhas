//Smooth Scroll
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});

//Search Button
var searchContent = document.querySelector(".searchContent");
var searchButton = document.querySelector(".searchButton");

searchButton.onclick = function () {
    if (searchContent.className === "searchContent") {
        searchContent.className = "searchContent Show";
        searchButton.className = "nav_buttons searchButton Close";
        if (!document.documentElement.classList.contains('active')) {
            document.documentElement.classList.add('active');
        }
        if (menuColapse.className === "menuColapse Show") {
            menuColapse.className = "menuColapse";
            menuButton.className = "nav_buttons menuButton";
        }
        if (userMenuColapse.className === "userMenuColapse Show") {
            userMenuColapse.className = "userMenuColapse";
            userButton.className = "nav_buttons user_button";
        }
    } else {
        searchContent.className = "searchContent";
        searchButton.className = "nav_buttons searchButton";
        document.documentElement.classList.remove('active');
    }
};

var menuColapse = document.querySelector(".menuColapse");
var menuButton = document.querySelector(".menuButton");

menuButton.onclick = function () {
    if (menuColapse.className === "menuColapse") {
        menuColapse.className = "menuColapse Show";
        menuButton.className = "nav_buttons menuButton Close";
        if (!document.documentElement.classList.contains('active')) {
            document.documentElement.classList.add('active');
        }
        if (searchContent.className === "searchContent Show") {
            searchContent.className = "searchContent";
            searchButton.className = "nav_buttons searchButton";
        }
        if (userMenuColapse.className === "userMenuColapse Show") {
            userMenuColapse.className = "userMenuColapse";
            userButton.className = "nav_buttons user_button";
        }
    } else {
        menuColapse.className = "menuColapse";
        menuButton.className = "nav_buttons menuButton";
        document.documentElement.classList.remove('active');
    }
};

var userMenuColapse = document.querySelector(".userMenuColapse");
var userButton = document.querySelector(".user_button");

userButton.onclick = function () {
    if (userMenuColapse.className === "userMenuColapse") {
        userMenuColapse.className = "userMenuColapse Show";
        userButton.className = "nav_buttons user_button Close";
        if (!document.documentElement.classList.contains('active') && window.innerWidth < 992) {
            document.documentElement.classList.add('active');
        }
        if (searchContent.className === "searchContent Show") {
            searchContent.className = "searchContent";
            searchButton.className = "nav_buttons searchButton";
        }
        if (menuColapse.className === "menuColapse Show") {
            menuColapse.className = "menuColapse";
            menuButton.className = "nav_buttons menuButton";
        }
    } else {
        userMenuColapse.className = "userMenuColapse";
        userButton.className = "nav_buttons user_button";
        document.documentElement.classList.remove('active');
    }
};

//When hit on html content, outside the menu, it closes.
document.documentElement.onclick = function (event) {
    if (event.target === document.documentElement) {
        menuColapse.className = "menuColapse";
        menuButton.className = "nav_buttons menuButton";
        searchContent.className = "searchContent";
        searchButton.className = "nav_buttons searchButton";
        userMenuColapse.className = "userMenuColapse";
        userButton.className = "nav_buttons user_button";
        document.documentElement.classList.remove('active');
    }
};

window.onresize = function () {
    if (window.innerWidth > 1199 && document.documentElement.classList.contains("active")) {
        document.documentElement.classList.remove("active");
    } else if (window.innerWidth <= 1199 && window.innerWidth > 991 && searchContent.className === "searchContent Show") {
        document.documentElement.classList.add("active");
    } else if (window.innerWidth > 991 && document.documentElement.classList.contains("active")) {
        document.documentElement.classList.remove("active");
    } else if ((window.innerWidth < 992 && (menuColapse.className === "menuColapse Show")) || (window.innerWidth < 992 && userMenuColapse.className === "userMenuColapse Show")) {
        document.documentElement.classList.add("active");
    } else if (window.innerWidth <= 991 && window.innerWidth > 718 && document.documentElement.classList.contains("active")) {
        document.documentElement.classList.remove("active");
    } else if (window.innerWidth < 718 && searchContent.className === "searchContent Show") {
        document.documentElement.classList.add("active");
    }
};

//OnScroll navbar style changes with an animation
var header = document.querySelector(".headerTop");
window.onscroll = function () {
    if (window.scrollY === 0) {
        header.className = "headerTop";
    } else {
        header.className = "headerTop headerScroll";
    }
};


window.onload = function (){
    if (window.scrollY === 0) {
        header.className = "headerTop";
    } else {
        header.className = "headerTop headerScroll";
    }
};

//When hit inside menu, closes it automatically
$(document).on('click', '.menuItens', function (){
    menuColapse.className = "menuColapse";
    menuButton.className = "nav_buttons menuButton";
    document.documentElement.classList.remove("active");
});