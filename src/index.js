// defining elements

const header = document.querySelector(".header");
const menu = document.querySelector(".header__menu");
const overlay = document.querySelector(".header__overlay");

let checkbox = document.querySelector('input[name="theme"]');
let htmlElement = document.documentElement;
const logo = document.getElementById("header__logo");
let slideshowFilter = document.querySelector(".slideshow__waves-img");

const scrollElement = document.querySelector(".scroll");
const headerElement = document.querySelector(".header");

let checkboxSearch = document.querySelector(".header__overlay-search");
const search = document.querySelector("#header__search");

const sidebarTabsAll = document.querySelectorAll(".sidebar__posts-tabs>a");
const sidebarContentAll = document.querySelectorAll(
  ".sidebar__posts-content>div"
);

const slideshow__carousel = document.querySelector(".slideshow__carousel-data");
if (slideshow__carousel) slideshow__carousel.classList.add("active");

// set theme initially

var count = 0;

if (!localStorage.getItem("darkMode")) {
  console.log("set");
  localStorage.setItem("darkMode", "false");
} else if(count == 0) {
  if (localStorage.getItem("darkMode") == "true") {
    switchDarkMode();
  } else {
    switchLightMode();
  }
  count = 1
}

// toggle theme

const toggleTheme = () => {

  if(localStorage.getItem("darkMode") == "true"){
    switchLightMode();
  } else {
    switchDarkMode();
  }
};

// menu toggle

const menuToggle = (type = "none") => {
  if (type === "add") {
    menu.classList.add("open");
    header.classList.add("open");
    overlay.classList.add("open");
    htmlElement.classList.add("noscroll");
  } else if (type === "remove") {
    menu.classList.remove("open");
    header.classList.remove("open");
    overlay.classList.remove("open");
    htmlElement.classList.remove("noscroll");
  } else {
    menu.classList.toggle("open");
    header.classList.toggle("open");
    overlay.classList.toggle("open");
    htmlElement.classList.toggle("noscroll");
  }
};

// scroll functions

const scrollUp = () => {
  window.addEventListener("scroll", () => {
    scrollElement.classList.toggle("active", window.scrollY > 200);

    //check header scroll
    headerElement.classList.toggle("active", window.scrollY > 0);
    headerElement.classList.toggle("one-edge-shadow", window.scrollY > 0);
    if (logo)
      logo.src =
      window.scrollY > 80 ? "images/logo-dark.png" : "images/logo-light.png";
  });

  function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  }

  let stopScrolling = false;

  window.addEventListener("touchmove", handleTouchMove, {
    passive: false,
  });

  function handleTouchMove(e) {
    if (!stopScrolling) {
      return;
    }
    e.preventDefault();
  }

  scrollElement.addEventListener("click", () => {
    scrollToTop();
  });
};

scrollUp();

//add search overlay

const addSearch = () => {
  menuToggle("remove");
  checkboxSearch.classList.add("open");
  htmlElement.classList.add("noscroll");
  search.focus();
};

//remove search overlay

const removeSearch = () => {
  checkboxSearch.classList.remove("open");
  htmlElement.classList.remove("noscroll");
};

//set sidebas posts

const sidebarPosts = (name) => {
  sidebarTabsAll.forEach((element) => {
    element.classList.remove("active");
  });
  sidebarContentAll.forEach((element) => {
    element.classList.remove("active");
  });

  if (name == "recents") {
    let sidebar = document.querySelector(".sidebar__posts-tabs-recents");
    let sidebarContent = document.querySelector(
      ".sidebar__posts-content-recent"
    );
    sidebar.classList.add("active");
    sidebarContent.classList.add("active");
  }
  if (name == "popular") {
    let sidebar = document.querySelector(".sidebar__posts-tabs-popular");
    sidebar.classList.add("active");
    let sidebarContent = document.querySelector(
      ".sidebar__posts-content-popular"
    );
    sidebarContent.classList.add("active");
  }
  if (name == "comments") {
    let sidebar = document.querySelector(".sidebar__posts-tabs-comments");
    sidebar.classList.add("active");
    let sidebarContent = document.querySelector(
      ".sidebar__posts-content-comments"
    );
    sidebarContent.classList.add("active");
  }
  if (name == "tags") {
    let sidebar = document.querySelector(".sidebar__posts-tabs-tags");
    sidebar.classList.add("active");
    let sidebarContent = document.querySelector(".sidebar__posts-content-tags");
    sidebarContent.classList.add("active");
  }
};


// remove html tags from comments


const removeHTML = (content) => {
  var clean = content.textContent || content.innerText;
  console.log(clean);
  return clean;
};

