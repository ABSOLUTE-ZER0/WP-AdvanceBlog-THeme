class Funtionality {
  // set theme initially

  constructor() {

    this.startingActions();
    this.scrollUp();
  }

  startingActions() {
    const slideshow__carousel = document.querySelector(
      ".slideshow__carousel-data"
    );
    if (slideshow__carousel) slideshow__carousel.classList.add("active");

    var count = 0;

    if (!localStorage.getItem("darkMode")) {
      console.log("set");
      localStorage.setItem("darkMode", "false");
    } else if (count == 0) {
      if (localStorage.getItem("darkMode") == "true") {
        switchDarkMode();
      } else {
        switchLightMode();
      }
      count = 1;
    }
  };



  // scroll functions

  scrollUp() {
    const logo = document.getElementById("header__logo");
    const scrollElement = document.querySelector(".scroll");
    const headerElement = document.querySelector(".header");

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



  // remove html tags from comments

  removeHTML(content) {
    var clean = content.textContent || content.innerText;
    console.log(clean);
    return clean;
  };

}
export default Funtionality