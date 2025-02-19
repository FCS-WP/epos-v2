$(document).ready(function ($) {
  //Trigger next button
  handleStep1();
  handleStep2();
  handle_submit_form();
  backToTop();
  handleHotspot();
  handleChangeTitleTestimonial();
  handleChangeTesMobile();
  toggleMenu();
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
      console.log($newHotspot, $targetBox);

      if ($newHotspot.length) {
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
  function toggleMenu() {
    const menuWrapper = $(".jkit-menu-wrapper");
    const body = $("body");

    if (menuWrapper.hasClass("active")) {
      body.addClass("menu-open");
    } else {
      body.removeClass("menu-open");
    }
  }
  const observer = new MutationObserver(toggleMenu);
    observer.observe(document.querySelector(".jkit-menu-wrapper"), {
        attributes: true,
        attributeFilter: ["class"]
    });
  function handleChangeTitleTestimonial() {
    const sectionTitle = $("#testimonial-title h2");
    const nextbutton = $("#mai-testimonial .elementor-swiper-button-next");

    const prebutton = $("#mai-testimonial .elementor-swiper-button-prev");
    prebutton.addClass("disable");

    nextbutton.on("click", function () {
      prebutton.removeClass("disable");
      nextbutton.addClass("disable");
      sectionTitle.text("Customer Retention");
    });

    prebutton.on("click", function () {
      nextbutton.removeClass("disable");
      sectionTitle.text("Customer Acquisition");
      prebutton.addClass("disable");
    });
  }
  function handleChangeTesMobile() {
    const sectionTitleMB = $("#testimonial-title-mobile h2");
    const nextbuttonMB = $(
      "#mai-testimonial-mobile .elementor-swiper-button-next"
    );

    const prebuttonMB = $(
      "#mai-testimonial-mobile .elementor-swiper-button-prev"
    );
    prebuttonMB.addClass("disable");

    nextbuttonMB.on("click", function () {
      prebuttonMB.removeClass("disable");
      if (
        $("#mai-testimonial-mobile .swiper-slide")
          .eq(4)
          .hasClass("swiper-slide-active")
      ) {
        nextbuttonMB.addClass("disable");
      }
      if (
        $("#mai-testimonial-mobile .swiper-slide")
          .eq(2)
          .hasClass("swiper-slide-active")
      ) {
        sectionTitleMB.text("Customer Retention");
      }
      if (
        $("#mai-testimonial-mobile .swiper-slide")
          .eq(4)
          .hasClass("swiper-slide-active")
      ) {
      }
    });

    prebuttonMB.on("click", function () {
      nextbuttonMB.removeClass("disable");
      if (
        $("#mai-testimonial-mobile .swiper-slide")
          .eq(3)
          .hasClass("swiper-slide-active")
      ) {
        sectionTitleMB.text("Customer Acquisition");
      }
      if (
        $("#mai-testimonial-mobile .swiper-slide")
          .eq(1)
          .hasClass("swiper-slide-active")
      ) {
        prebuttonMB.addClass("disable");
      }
    });
  }
});

whatsappContact({
  buttonName: "Start Chat",
  brandImageUrl:
    "https://www.epos.com.sg/wp-content/uploads/2020/01/pos-system.svg",
  brandName: "EPOS POS System",
  brandStatusText: "Typically replies within a day",
  buttonPosition: "bottom-right",
  phoneNumber: "6584821888",
  welcomeMessage: "Hi there! 👋 How can I help you?",
  prefillMessages: "I am looking for: ",
  replyOptions: "F&B POS System,Retail POS System,Others,Tech Support",
});
