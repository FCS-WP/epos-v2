$(document).ready(function ($) {
  //Trigger next button
  handleStep1();
  handleStep2();
  handle_submit_form();
  backToTop();
  handleHotspot();
  handleChangeTitleTestimonial();
  handleChangeTesMobile();
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

  function handleChangeTitleTestimonial() {
    const sectionTitle = $("#testimonial-title h2");
    const nextbutton = $(".mai-testimonial .elementor-swiper-button-next");

    const prebutton = $(".mai-testimonial .elementor-swiper-button-prev");
    prebutton.addClass("disable");

    nextbutton.on("click", function () {
      prebutton.removeClass("disable");
      if (
        $(".mai-testimonial .swiper-slide")
          .eq(2)
          .hasClass("swiper-slide-active")
      ) {
        sectionTitle.text("Customer Retention");
        nextbutton.addClass("disable");
      }
      if (
        $(".mai-testimonial .swiper-slide")
          .eq(4)
          .hasClass("swiper-slide-active")
      ) {
      }
    });

    prebutton.on("click", function () {
      nextbutton.removeClass("disable");
      if (
        $(".mai-testimonial .swiper-slide")
          .eq(1)
          .hasClass("swiper-slide-active")
      ) {
        sectionTitle.text("Customer Acquisition");
        prebutton.addClass("disable");
      }
    });
  }
  function handleChangeTesMobile() {
    const sectionTitle = $("#testimonial-title-mobile h2");
    const nextbutton = $(
      "#mai-testimonial-mobile .elementor-swiper-button-next"
    );

    const prebutton = $(
      "#mai-testimonial-mobile .elementor-swiper-button-prev"
    );
    prebutton.addClass("disable");

    nextbutton.on("click", function () {
      prebutton.removeClass("disable");
      if (
        $("#mai-testimonial-mobile .swiper-slide")
          .eq(4)
          .hasClass("swiper-slide-active")
      ) {
        nextbutton.addClass("disable");
      }
      if (
        $("#mai-testimonial-mobile .swiper-slide")
          .eq(2)
          .hasClass("swiper-slide-active")
      ) {
        sectionTitle.text("Customer Retention");
      }
      if (
        $("#mai-testimonial-mobile .swiper-slide")
          .eq(4)
          .hasClass("swiper-slide-active")
      ) {
      }
    });

    prebutton.on("click", function () {
      nextbutton.removeClass("disable");
      if (
        $("#mai-testimonial-mobile .swiper-slide")
          .eq(3)
          .hasClass("swiper-slide-active")
      ) {
        sectionTitle.text("Customer Acquisition");
      }
      if (
        $("#mai-testimonial-mobile .swiper-slide")
          .eq(1)
          .hasClass("swiper-slide-active")
      ) {
        prebutton.addClass("disable");
      }
    });
  }
});

function whatsappContact({
  brandName: d_brandName = "",
  buttonName: d_buttonName = "Chat with us",
  brandStatusText: d_StatusText = "",
  welcomeMessage: d_welcomeMsg = "",
  phoneNumber: d_phoneNumber = "",
  brandImageUrl: d_ImageUrl = "",
  callToAction: d_ctaText = "Start Chat",
  buttonSize: d_buttonSize = "large",
  prefillMessages: d_prefillMessages = "",
  replyOptions: d_replyOptions = "",
  buttonPosition: d_buttonPosition = "bottom-right",
}) {
  var decodedImageUrl = decodeURIComponent(d_ImageUrl);
  let widget_template = `
   <div class="wapp-widgetGrp">
    <div class="wapp-preview">
      <div class="wapp-topStripe">
        <div class="wapp-profileSec">
          <span class="wapp-profileLft">{{brandImageUrl}}</span>
          <span class="wapp-profileRht">
            <span class="wapp-name">{{brandName}}</span>
            <span class="wapp-status">{{brandStatusText}}</span>
          </span>
        </div>
        <span class="wapp-widgetClose"><i aria-hidden="true" class="jki jki-times-solid"></i></span>
      </div>
      <div class="wapp-msgSection">
        <div class="wapp-msgLft">
          <span class="wapp-msgdefault">{{brandName}}</span>
          <span class="wapp-msgCont">{{welcomeMessage}}</span>
        </div>
        <div class="wapp-msgRht">
          <div class="wapp-msgRhtInner">
            <span class="wapp-dynamicMsg">{{prefillMessages}} <span class="dynamicMsg"></span></span>
            <div class="wapp-tagGroups">
              <span class="wapp-smarttags"><button class="wapp-smarttag-btn" data-tags="Support Assistance"
                  value="Support Assistance">Support Assistance</button></span>
            </div>
          </div>
        </div>
      </div>
      <div class="wapp-btnSection">
        <a class="whatsapp-link" style='text-decoration:none;width:100%'
          href='https://api.whatsapp.com/send?phone={{phoneNumber}}&amp;text={{prefillMessages}}'
          rel='noopener noreferrer' target='_blank'><button class="wapp-chatCta"><span class="wapp-icon"></span><span
              class="wapp-ctaTxt">{{callToAction}}</span></button></a>
      </div>
    </div>
    <div class="wapp-float-btn {{buttonPosition}}">
      <button class="wapp-chatCta epos-whatsapp-icon">
        <img src="https://epos.theshin.info/possystem/wp-content/themes/zippy-elementor-child/assets/icons/icon-contact.png" alt="to EPOS WhatsApp Chat" width="50" height="50">
      </button>
    </div>
  </div>`;
  var size = { large: "large", medium: "medium", small: "small" };
  widget_template = (widget_template = (widget_template = (widget_template =
    (widget_template = (widget_template = (widget_template = (widget_template =
      (widget_template = (widget_template = (widget_template =
        widget_template.replaceAll("{{buttonName}}", d_buttonName)).replaceAll(
        "{{brandImageUrl}}",
        decodedImageUrl
      )).replaceAll("{{brandName}}", d_brandName)).replaceAll(
        "{{brandStatusText}}",
        d_StatusText
      )).replaceAll(
      "{{buttonSize}}",
      size[d_buttonSize] || size.large
    )).replaceAll("{{callToAction}}", d_ctaText)).replaceAll(
      "{{phoneNumber}}",
      d_phoneNumber
    )).replaceAll("{{prefillMessages}}", d_prefillMessages)).replaceAll(
    "{{buttonPosition}}",
    d_buttonPosition
  )).replaceAll("{{welcomeMessage}}", d_welcomeMsg)).replaceAll(
    "{{replyOptions}}",
    d_replyOptions
  );
  document.addEventListener("DOMContentLoaded", function () {
    // Append widget button
    document
      .querySelector("body")
      .insertAdjacentHTML("beforeend", widget_template),
      (document.querySelector(".wapp-preview").style.display = "none");
    var prefillMsgElement =
      document.querySelector(".wapp-dynamicMsg").innerText;
    var brand_icon = d_brandName.charAt(0);
    document.getElementsByClassName("wapp-txtImg").innerHTML = brand_icon;
    // Widget char preview
    var preview_sec = document.querySelector(".wapp-preview");
    document.body.addEventListener("click", function (event) {
      if (event.target.closest(".wapp-chatCta")) {
        var cur_prop = window.getComputedStyle(preview_sec).display;
        preview_sec.style.display = cur_prop === "none" ? "block" : "none";
      } else if (event.target.matches(".wapp-widgetClose")) {
        preview_sec.style.display = "none";
      }
    });
    // Dynamically generated buttons
    var optionsArray = d_replyOptions.split(","),
      tagGroupsDiv = document.querySelector(".wapp-tagGroups");
    tagGroupsDiv.innerHTML = "";
    if (optionsArray.length > 0) {
      var newHTML = "";
      optionsArray.forEach(function (option) {
        newHTML += `<span class="wapp-smarttags"><button class="wapp-smarttag-btn" data-tags="${option.trim()}" value="${option.trim()}">${option.trim()}</button></span>`;
      });
      tagGroupsDiv.innerHTML = newHTML;
    }
    // Select all the dynamically generated buttons
    document
      .querySelector(".wapp-tagGroups")
      .addEventListener("click", function (e) {
        if (e.target && e.target.matches(".wapp-smarttag-btn")) {
          var tags = document.querySelectorAll(".wapp-smarttag-btn");
          for (var tag of tags) {
            tag.classList.remove("active");
          }
          e.target.className += " active";
          var buttonText = e.target.innerText,
            dynamicMsgElement = document.querySelector(".dynamicMsg");
          dynamicMsgElement.innerText = buttonText;
          var prefillMsg = prefillMsgElement + " " + buttonText;
          var whatsappLink = `https://api.whatsapp.com/send?phone=${d_phoneNumber}&text=${encodeURIComponent(
            prefillMsg
          )}`;
          document.querySelector(".whatsapp-link").href = whatsappLink;
        }
      });
  });
}

whatsappContact({
  buttonName: "Start Chat",
  brandImageUrl:
    "%3Cimg%20alt%3D%22EPOS%20POS%20System%22%20src%3D%22https%3A%2F%2Fscontent.fsin6-1.fna.fbcdn.net%2Fv%2Ft39.30808-6%2F446997660_785300073745443_4622930025704883901_n.jpg%3F_nc_cat%3D104%26ccb%3D1-7%26_nc_sid%3D6ee11a%26_nc_ohc%3DRAv7z7reg1YQ7kNvgHh5J-O%26_nc_oc%3DAdgbUcHNq5ni-XBes6RVFnREufmYLeyOGgbXOZ8jakY4RqWnlsg7AjwkMuBJQ3qqD4U%26_nc_zt%3D23%26_nc_ht%3Dscontent.fsin6-1.fna%26_nc_gid%3DAlSSEl1Xm37JhWtsCyAF3v1%26oh%3D00_AYCWaeItrB5YjFVZlDXs17fHQrWP7fcl808cFu1WtQBA3w%26oe%3D67B49398%22%20%2F%3E",
  brandName: "EPOS POS System",
  brandStatusText: "Typically replies within a day",
  buttonPosition: "bottom-right",
  phoneNumber: "6584821888",
  welcomeMessage: "Hi there! 👋 How can I help you?",
  prefillMessages: "I am looking for:",
  replyOptions: "F&B POS System,Retail POS System,Others,Tech Support",
});
