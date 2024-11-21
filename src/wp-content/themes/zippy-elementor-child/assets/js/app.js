$(document).ready(function ($) {
  //Trigger next button
  handleStep1();
  handleStep2();
  handle_submit_form();
  function handleStep1() {
    const discribes_button = $(".elementor-field-group-industry")
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
    const discribes_button = $(".elementor-field-group-increase_sales")
      .children(".elementor-field-subgroup")
      .find("label");

    discribes_button.each((index, ele) => {
      $(ele).on("click", function () {
        console.log($(this));
        $(".elementor-field-group-step_2")
          .find(".e-form__buttons__wrapper__button-next")
          .trigger("click");
      });
    });
  }

  function handle_submit_form() {
    $("#get_demo_form ").on("submit", function (e) {
      $("#get_demo_form").addClass("submited");
    });
  }
});
