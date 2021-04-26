jQuery(function($) {

    $('body').on('change', '.qty', function() { // поле с количеством имеет класс .qty
        $('[name="update_cart"]').trigger('click');
    });

    var $quantityArrowMinus = $(".add_quantity_wrapper .var_quantity-arrow-minus");
    var $quantityArrowPlus = $(".add_quantity_wrapper .var_quantity-arrow-plus");
    
 
    $quantityArrowMinus.click(quantityMinus);
    $quantityArrowPlus.click(quantityPlus);
 
    function quantityMinus(event) {
     var $quantityNum = $(this).parent().find('.quantity input[type="number"]'); 
      if ($quantityNum.val() > 1) {
        $quantityNum.val(+$quantityNum.val() - 1);
      }
      event.preventDefault();
      //event.stopProragation();
    }
 
    function quantityPlus(event) {
      var $quantityNum = $(this).parent().find('.quantity input[type="number"]');
      $quantityNum.val(+$quantityNum.val() + 1);
      event.preventDefault();
      //event.stopProragation();
    }
   
});
// $(window).on('load', function() {
      //window.load = function() {
        window.addEventListener('load', function () {     
          var gridBlock = document.querySelector('.home-grid-wraper');
          var gridCells = gridBlock.querySelectorAll('.home-grid-wraper>*');
          
          var  divNewGrid = document.createElement('div');
          divNewGrid.classList.add('upper_home_grid');

          gridBlock.after(divNewGrid);
          gridCells.forEach(function(divChild ) {
            //console.log(divChild );
            var newCell =  divChild.cloneNode(true);
            var newClass = '';
            for (var name of newCell.classList) {
              if (name.inludes('bg_color')) {
                newClass = name;
              }
            }
            console.log(newCell.classList);//document.createElement('div');
            divNewGrid.append(newCell);
          });
      }, false);