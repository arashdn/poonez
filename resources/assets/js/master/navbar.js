$(document).ready(function () {
    if($('.search_btn').length > 0){
        $('.search_btn').on('click', function(e) {
            e.preventDefault();
            $('.fixed-button').addClass('z_index');
            $('#search').addClass('open1');
            $('#search > form > input[type="search"]').focus();
        });
        $('#search, #search button.close').on('click keyup', function(event) {
            if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
                $(this).removeClass('open1');
                $('.fixed-button').removeClass('z_index');
            }
        });
    }
});