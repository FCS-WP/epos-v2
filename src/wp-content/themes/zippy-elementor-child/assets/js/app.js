$(document).ready(function ($) {
  //Trigger next button
  handleStep1();
  handleStep2();
  handle_submit_form();
  backToTop();
  handleHotspot();
  function handleStep1() {
    const discribes_button = $(".elementor-field-group-school")
      .children(".elementor-field-subgroup")
      .find("label");

    discribes_button.each((index, ele) => {
      $(ele).on("click", function () {
        // console.log($(this));
        $(".elementor-field-group-step_1")
          .find(".e-form__buttons__wrapper__button-next")
          .trigger("click");
      });
    });
  }

  function handleStep2() {
    const discribes_button = $(".elementor-field-group-date_of_birth")
      .children(".elementor-field-subgroup")
      .find("label");

    discribes_button.each((index, ele) => {
      $(ele).on("click", function () {
        $(".elementor-field-group-step_2")
          .find(".e-form__buttons__wrapper__button-next")
          .trigger("click");
      });
    });
  }

  function backToTop() {
    // Back to top
    var amountScrolled = 500;
    var amountScrolledNav = 25;

    $(window).on("scroll", function () {
      if ($(window).scrollTop() > amountScrolled) {
        $("button.back-to-top").addClass("show");
      } else {
        $("button.back-to-top").removeClass("show");
      }
    });

    $("button.back-to-top").on("click", function () {
      $("html, body").animate(
        {
          scrollTop: 0,
        },
        1200
      );
      return false;
    });
  }

  function handle_submit_form() {
    $("#get_demo_form").on("submit", function (e) {
      $("#get_demo_form").addClass("waiting-redirect");

      const targetNode = document.querySelector("#get_demo_form");

      const observer = new MutationObserver((mutationsList) => {
        mutationsList.forEach((mutation) => {
          if (
            mutation.type === "attributes" &&
            mutation.attributeName === "class"
          ) {
            const currentClasses = mutation.target.classList;
            if (!currentClasses.contains("my-class")) {
              // console.log("Class 'my-class' was removed!");
            }
          }
        });
      });

      if (targetNode) {
        observer.observe(targetNode, {
          attributes: true,
          attributeFilter: ["class"],
        });
      }
      // setTimeout(function () {
      //   // Trigger the second form submission

      // }, 1000);
    });
  }
  function handleHotspot() {
    const $hotspots = $(".hotspot-wrapper");
    const $prevButton = $(".nav-button.prev");
    const $nextButton = $(".nav-button.next");
    const $mobileInfoBox = $(".mobile-info-box .info-box-content");
    let currentIndex = 0;

    function showHotspot(index) {
      $(".hotspot-wrapper, .info-box").removeClass("active");

      const $newHotspot = $hotspots.eq(index);
      const targetId = $newHotspot.find(".hotspot-icon").data("target");
      const $targetBox = $("#" + targetId);

      if ($newHotspot.length && $targetBox.length) {
        $newHotspot.addClass("active");
        $targetBox.addClass("active");

        if ($(window).width() <= 1024) {
          $mobileInfoBox.html($targetBox.html()).addClass("active");
        }
      }
    }

    $prevButton.on("click", function () {
      currentIndex = (currentIndex - 1 + $hotspots.length) % $hotspots.length;
      showHotspot(currentIndex);
    });

    $nextButton.on("click", function () {
      currentIndex = (currentIndex + 1) % $hotspots.length;
      showHotspot(currentIndex);
    });

    $hotspots.on("click", function (event) {
      event.stopPropagation();
      currentIndex = $hotspots.index(this);
      showHotspot(currentIndex);
    });

    showHotspot(currentIndex);
  }
});
