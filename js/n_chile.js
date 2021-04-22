jQuery(function($) {

    $('body').on('change', '.qty', function() { // поле с количеством имеет класс .qty
        $('[name="update_cart"]').trigger('click');
    });

});