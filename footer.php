<footer class="footer">
  <div class="footer__background"></div>
  <div class="footer__details d-none d-md-flex">
    <h1 class="titleStyle2">Contact Us</h1>
    <p>
      Couldn't find what you were looking for? Got stuck somehwere and need
      help? Contact us any time and get the help you are looking for.
      <br /><strong>We are always here for you!</strong>
    </p>
    <div class="footer__details-button buttonStyle2">
      <a href="/contact">Contact Us</a>
    </div>
  </div>

  <div class="footer__touch">
    <h1>Get in touch</h1>
    <div>
      <h2><i class="far fa-envelope"></i> Send an email</h2>
      <p>support@abslzero.in</p>
    </div>
    <hr />
    <div>
      <h2><i class="fas fa-mobile-alt"></i> Give us a ring</h2>
      <p>Sricharan +91 6300-499-255 04:30 - 16:30 (GMT)</p>
    </div>
  </div>

  <div class="footer__rights">
    <div>
      <span>
        <span style="color: var(--color-active);">Pages: </span>
        <a href="/"> Home</a> |
        <a href="/blog"> Blog</a>
      </span>

    </div>
    <div>
      <p>Absolute Zero © 2021. All Rights Reserved.</p>

    </div>
  </div>
</footer>

<div class="scroll"></div>

<script>
  //set dark and light mode

  let checkbox = document.querySelector('input[name="theme"]');
  let htmlElement = document.documentElement;
  const logo = document.getElementById("header__logo");
  let slideshowFilter = document.querySelector(".slideshow__waves-img");

  checkbox.addEventListener("click", () => {
      {
        if (localStorage.getItem("darkMode") == "true") {
          switchLightMode();
        } else {
          switchDarkMode();
        }
      };
    });

  let smoothTrans = () => {
    htmlElement.classList.add("transition");

    window.setTimeout(() => {
      htmlElement.classList.remove("transition");
    }, 500);
  };

  const switchDarkMode = () => {
    checkbox.checked = true;
    localStorage.setItem("darkMode", "true")
    smoothTrans();
    if (logo) {
      logo.src = "images/logo-dark.png";
    }
    if (slideshowFilter){
      slideshowFilter.src = "<?php echo get_theme_file_uri("images/slideshow-waves-dark.png"); ?>";
    }
    htmlElement.setAttribute("data-theme", "dark");
  };


  const switchLightMode = () => {
    checkbox.checked = false;
    localStorage.setItem("darkMode", "false")
    smoothTrans();
    if (logo) {
      logo.src = "images/logo-light.png";
    }
    if (slideshowFilter){
      slideshowFilter.src = "<?php echo get_theme_file_uri("images/slideshow-waves-light.png"); ?>";
    }
    htmlElement.setAttribute("data-theme", "light");
  };
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<?php wp_footer(); ?>
</body>

</html>