(function ($) {

    console.log('hello');
    var burger = $('#burgerlogo');
    burger.on('click', function () {

        // event.preventDefoult();
        // console.log('hello');

        $('.liens_burger').slideToggle('slow');
        $('.liens_burger li').on('click', function () {
            $('.liens_burger').slideUp();


        })
    })


    //     console.log('hello');
    // });

    // console.log('hello');  
})(jQuery);