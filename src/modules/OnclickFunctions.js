class OnclickFunctions {
  constructor() {
    this.searchIcon = document.querySelector(
      ".header__nav--links__search-container"
    );

    this.checkboxSearch = document.querySelector(".header__overlay-search");

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

    this.searchBar = document.querySelector("#header__search");
    this.searchResultsDiv = document.querySelector(
      ".header__overlay-search-results"
    );

    this.likeButton = document.querySelector(".like-button");
    this.likeButtonRedirect = document.querySelector(".like-button-redirect");
    this.likeButtonIcon = document.querySelector(".like-button>i");

    this.searchOverlayOpen = false;

    this.spinnerActive = false;

    this.prevSearchValue = "";

    this.typingTimer;

    this.events();
  }

  events() {
    document.addEventListener("keydown", (e) => {
      if (e.key == "Escape" && this.searchOverlayOpen) this.removeSearch();
    });

    if (this.searchBar) {
      this.searchBar.addEventListener("keyup", (e) => {
        this.typingLogic();
      });
    }

    if (this.searchIcon) {
      this.searchIcon.addEventListener("click", () => {
        this.addSearch();
      });
    }

    if (this.searchCloseIcon) {
      this.searchCloseIcon.addEventListener("click", () => {
        this.removeSearch();
      });
    }

    if (this.menuToggleIcon) {
      this.menuToggleIcon.addEventListener("click", () => {
        this.menuToggle();
      });
    }

    if (this.sidebarRecent) {
      this.sidebarRecent.addEventListener("click", () => {
        this.sidebarPosts("recents");
      });
    }

    if (this.sidebarPopular) {
      this.sidebarPopular.addEventListener("click", () => {
        this.sidebarPosts("popular");
      });
    }

    if (this.sidebarComments) {
      this.sidebarComments.addEventListener("click", () => {
        this.sidebarPosts("comments");
      });
    }

    if (this.sidebarTags) {
      this.sidebarTags.addEventListener("click", () => {
        this.sidebarPosts("tags");
      });
    }

    if (this.likeButton) {
      this.likeButton.addEventListener("click", () => this.toggleLike());
    }

    if (this.likeButtonRedirect) {
      this.likeButtonRedirect.addEventListener("click", () =>
        this.loginRedirect()
      );
    }
  }

  loginRedirect() {
    const url = this.likeButtonRedirect.dataset.redirect;
    window.open(url, "_self");
  }

  toggleLike() {
    if (this.likeButton.classList.contains("liked")) {
      this.removeLike(this.likeButton);
    } else {
      this.addLike(this.likeButton);
    }
  }

  async addLike(currentLikeButton) {
    const axios = require("axios");
    currentLikeButton.classList.add("liked");

    try {
      let config = {
        headers: {
          "X-WP-Nonce": blogData.nonce,
        },
      };

      let data = {
        postId: currentLikeButton.dataset.postid,
      };

      const response = await axios.post(
        `${blogData.root_url}/wp-json/blog/v1/like`,
        data,
        config
      );

      if (response.data.status == "liked") {
        currentLikeButton.setAttribute("data-likeid", response.data.id);
      }
    } catch (error) {
      console.error(error);
    }
  }

  async removeLike(currentLikeButton) {
    const axios = require("axios");
    currentLikeButton.classList.remove("liked");

    try {
      let config = {
        headers: {
          "X-WP-Nonce": blogData.nonce,
        },
        data: {
          likeId: currentLikeButton.dataset.likeid,
        },
      };

      const response = await axios.delete(
        `${blogData.root_url}/wp-json/blog/v1/like`,
        config
      );

      if (response.data == "unliked") {
        currentLikeButton.setAttribute("data-likeid", "");
      }
    } catch (error) {
      console.error(error);
    }
  }

  typingLogic() {
    if (this.prevSearchValue != this.searchBar.value) {
      clearTimeout(this.typingTimer);

      if (this.searchBar.value == "") {
        this.searchBar.classList.remove("typed");
        this.checkboxSearch.classList.remove("allowScroll");
        this.searchResultsDiv.innerHTML = "";
        this.spinnerActive = false;
      } else {
        this.searchBar.classList.add("typed");
        this.checkboxSearch.classList.add("allowScroll");
        if (!this.spinnerActive) {
          this.searchResultsDiv.innerHTML =
            "<div class='spinner-loader'></div>";
          this.spinnerActive = true;
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 1000);
      }
    }

    this.prevSearchValue = this.searchBar.value;
  }

  async getResults() {
    const axios = require("axios");

    try {
      const response = await axios.get(
        `${blogData.root_url}/wp-json/blog/v1/search?search=${this.searchBar.value}`
      );

      let postResult = "";
      let pageResult = "";

      response.data["post"].forEach((post) => {
        postResult =
          postResult +
          `
          <a href="${post.link}" class="header__overlay-search-results-post">
            <h2>${post.title}<p> By ${post.authorName}</p></h2>
          </a>`;
      });

      response.data["page"].forEach((page) => {
        pageResult =
          pageResult +
          `
          <a href="${page.link}" class="header__overlay-search-results-post">
            <h2>${page.title}</h2>
          </a>`;
      });

      if (postResult == "") {
        postResult = "<h2>No Posts found!</h2>";
      }
      if (pageResult == "") {
        pageResult = "<h2>No Pages found!</h2>";
      }

      let finalResult = `
        <div>
          <h1 class="titleStyle5">Posts</h1>
          ${postResult}
        </div>

        <div>
          <h1 class="titleStyle5">Pages</h1>
          ${pageResult}
        </div>
    `;

      this.searchResultsDiv.innerHTML = finalResult;
      this.spinnerActive = false;
    } catch (error) {
      console.error(error);
    }
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
    let htmlElement = document.documentElement;
    this.menuToggle("remove");
    this.checkboxSearch.classList.add("open");
    htmlElement.classList.add("noscroll");
    search.focus();
    this.searchOverlayOpen = true;
  }

  //remove search overlay

  removeSearch() {
    let htmlElement = document.documentElement;
    this.checkboxSearch.classList.remove("open");
    htmlElement.classList.remove("noscroll");
    this.checkboxSearch.classList.remove("allowScroll");
    this.searchBar.classList.remove("typed");
    this.searchBar.value = "";
    this.searchOverlayOpen = false;
    this.searchResultsDiv.innerHTML = "";
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