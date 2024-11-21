$(document).ready(function ($) {
  // Function to handle the button click triggering for a given step
  function handleStep(stepClass, buttonClass) {
    const stepButtons = $(`.${stepClass}`)
      .children(".elementor-field-subgroup")
      .find("label");

    stepButtons.each((index, ele) => {
      $(ele).on("click", function () {
        // Trigger the next button click for the current step
        $(`.${stepClass}`).find(buttonClass).trigger("click");
      });
    });
  }

  // Trigger next button for Step 1 and Step 2
  handleStep(
    "elementor-field-group-step_1",
    ".e-form__buttons__wrapper__button-next"
  );
  handleStep(
    "elementor-field-group-step_2",
    ".e-form__buttons__wrapper__button-next"
  );
});
