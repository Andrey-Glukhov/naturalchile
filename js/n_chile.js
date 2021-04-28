jQuery(function ($) {
  $("body").on("change", ".qty", function () {
    // поле с количеством имеет класс .qty
    $('[name="update_cart"]').trigger("click");
  });

  var $quantityArrowMinus = $(
    ".add_quantity_wrapper .var_quantity-arrow-minus"
  );
  var $quantityArrowPlus = $(".add_quantity_wrapper .var_quantity-arrow-plus");

  $quantityArrowMinus.click(quantityMinus);
  $quantityArrowPlus.click(quantityPlus);

  function quantityMinus(event) {
    var $quantityNum = $(this).parent().find('.quantity input[type="number"]');
    if ($quantityNum.val() > 1) {
      $quantityNum.val(+$quantityNum.val() - 1);
    }
    event.preventDefault();
  }

  function quantityPlus(event) {
    var $quantityNum = $(this).parent().find('.quantity input[type="number"]');
    $quantityNum.val(+$quantityNum.val() + 1);
    event.preventDefault();
  }
});
