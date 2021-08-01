class OnclickFunctions {
  constructor() {
    this.searchIcon = document.querySelector(
      ".header__nav--links__search-container"
    );
    this.searchCloseIcon = document.querySelector(
      ".header__overlay-search--line"
    );
    this.menuToggleIcon = document.querySelector(".header__menu");

    this.sidebarRecent = document.querySelector(".sidebar__posts-tabs-recents");
    this.sidebarPopular = document.querySelector(
      ".sidebar__posts-tabs-popular"
    );
    this.sidebarComments = document.querySelector(
      ".sidebar__posts-tabs-comments"
    );
    this.sidebarTags = document.querySelector(".sidebar__posts-tabs-tags");

    this.events();
  }

  events() {
    this.searchIcon.addEventListener("click", () => {
      this.addSearch();
    });

    this.searchCloseIcon.addEventListener("click", () => {
      this.removeSearch();
    });

    this.menuToggleIcon.addEventListener("click", () => {
      this.menuToggle();
    });

    this.sidebarRecent.addEventListener("click", () => {
      this.sidebarPosts("recents");
    });

    this.sidebarPopular.addEventListener("click", () => {
      this.sidebarPosts("popular");
    });

    this.sidebarComments.addEventListener("click", () => {
      this.sidebarPosts("comments");
    });

    this.sidebarTags.addEventListener("click", () => {
      this.sidebarPosts("tags");
    });
  }

  // menu toggle

  menuToggle(type = "none") {
    const header = document.querySelector(".header");
    const menu = document.querySelector(".header__menu");
    const overlay = document.querySelector(".header__overlay");
    let htmlElement = document.documentElement;

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
  }

  //add search overlay

  addSearch() {
    const search = document.querySelector("#header__search");
    let checkboxSearch = document.querySelector(".header__overlay-search");
    let htmlElement = document.documentElement;

    this.menuToggle("remove");
    checkboxSearch.classList.add("open");
    htmlElement.classList.add("noscroll");
    search.focus();
  }

  //remove search overlay

  removeSearch() {
    let checkboxSearch = document.querySelector(".header__overlay-search");
    let htmlElement = document.documentElement;

    checkboxSearch.classList.remove("open");
    htmlElement.classList.remove("noscroll");
  }

  //set sidebas posts

  sidebarPosts(name) {
    const sidebarTabsAll = document.querySelectorAll(".sidebar__posts-tabs>a");
    const sidebarContentAll = document.querySelectorAll(
      ".sidebar__posts-content>div"
    );

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
      let sidebarContent = document.querySelector(
        ".sidebar__posts-content-tags"
      );
      sidebarContent.classList.add("active");
    }
  }
}
export default OnclickFunctions;
