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
        window.addEventListener('load', setGrid, false);
        window.addEventListener('resize', setGrid, false);
        function setGrid() {
          
        }
      //   var gridTime1 = gsap.timeline({repeat: -1, repeatDelay: 3, yoyo: 1});
      //   var gridTime2 = gsap.timeline({repeat: -1, repeatDelay: 2, yoyo: 1});
      //   var animate1 = ['upper-cell-2', 'upper-cell-10'];
      //   var animate2 = ['upper-cell-13'];
      //   var animate3 = ['upper-cell-4', 'upper-cell-16'];
      //   var animate4 = ['upper-cell-34'];
      //   function setGrid() { 
      //     if (! $('.home-grid-wraper').length) { 
      //       return;
      //     }      
      //     var gridBlock = document.querySelector('.home-grid-wraper');
      //     var gridCells = document.querySelectorAll('.home-grid-wraper>*');
      //     if (document.querySelector('.upper_home_grid')) {
      //       //console.log('++++');
      //       document.querySelector('.upper_home_grid').remove();
      //       gridTime1.clear();
      //       gridTime2.clear();
      //       //return;
      //     }
      //     var  divNewGrid = document.createElement('div');
      //     divNewGrid.classList.add('upper_home_grid');

      //     gridBlock.after(divNewGrid);
      //     gridCells.forEach(function(divChild ) {
      //       //console.log(divChild );
      //       var newCell =  divChild.cloneNode(true);
      //       var newClassColor = '';
      //       var newClassNumber = '';
      //       for (var name of newCell.classList) {
      //         if (name.includes('bg_color')) {
      //           newClassColor = name;
      //         }
      //         if (name.includes('home-cell')) {
      //           if (name.match(/\d+/)[0]){
      //             newClassNumber = 'upper-cell-' + name.match(/\d+/)[0] ;
      //           }  
      //         }
      //       }
      //       newCell.className = newClassColor + ' ' + newClassNumber;
      //       newCell.style.width = divChild.offsetWidth +'px';
      //       newCell.style.height = divChild.offsetHeight + 'px';
      //       newCell.style.top = divChild.offsetTop +'px';
      //       newCell.style.left = divChild.offsetLeft + 'px'
      //      // console.log(newCell.classList);//document.createElement('div');
      //       divNewGrid.append(newCell);
      //       if (animate1.includes(newClassNumber)) {
      //         newCell.style.zIndex = '10';
      //         gridTime1.to(newCell, {borderRight: '12px solid #000', duration: 0.1});
      //         gridTime1.to(newCell, {width: 2* divChild.offsetWidth+6, duration: 3});
      //       } //else if (animate2.includes(newClassNumber)) {
      //       //   newCell.style.zIndex = '10';
      //       //   gridTime1.to(newCell, {height: 2* divChild.offsetHeight, duration: 3});
      //       // } else if (animate3.includes(newClassNumber)) {
      //       //   newCell.style.zIndex = '10';
      //       //   gridTime2.to(newCell, {height: 2* divChild.offsetHeight, duration: 3});
      //       // } else if (animate4.includes(newClassNumber)) {
      //       //   newCell.style.zIndex = '10';
      //       //   gridTime2.to(newCell, {height: 2* divChild.offsetHeight, duration: 3});
      //       // }
      //     });

      // }