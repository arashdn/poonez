function openSearch()
{
    $('.fixed-button').addClass('z_index');
    $('#search').addClass('open1');
    $('#search > form > input[type="search"]').focus();
}

function closeSearch()
{
    $("#search").removeClass('open1');
    $('.fixed-button').removeClass('z_index');
}

$(document).ready(function () {
    if($('.search_btn').length > 0){
        $('.search_btn').on('click', function(e) {
            e.preventDefault();
            openSearch();
        });
        $('#search, #search button.close').on('click keyup', function(event) {
            if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
               closeSearch();
            }
        });

        $('#search-form').on('submit',function (e)
        {
            e.preventDefault();
            var query = $("#search-input").val();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $.param({
                    'query':query,
                }),
                beforeSend:function()
                {
                    $('.search_btn').hide();
                },
                complete: function()
                {
                    $('.search_btn').show();
                    $('#search-input').val('');
                    closeSearch();
                },
                success: function (data)
                {
                    try
                    {
                        switch(data.status)
                        {
                            case 'error':
                                toastr.error(data.message, 'خطا');
                                break;
                            case 'access_error':
                                toastr.error(data.message, 'خطا');
                                break;
                            case 'ok':
                                $('#myModal').modal('show');
                                $('.search-result-item').remove();
                                $.each(data.hits.hits, function(k, v)
                                {
                                    if(v._type == 'users')
                                    {
                                        $("#search-result-wrapper").append(
                                            "<div class=\"col-md-12 search-result-item\">\n" +
                                            "    <span><i class=\"fa fa-circle\" style=\"font-size:10px; color:green\"></i></span>&nbsp;&nbsp;\n" +
                                            "    <img class=\"img-circle\" src=\"http://placehold.it/50x50\" style=\"width:50px;height:50px;\">&nbsp;&nbsp;&nbsp;\n" +
                                            "    <span><a href=\""+data.user_link+"/"+v._source.id+"\">"+v._source.name+"</a></span>&nbsp;&nbsp;&nbsp;\n" +
                                            "    &nbsp;&nbsp;\n" +
                                            "    <a href=\""+data.user_link+"/"+v._source.id+"\">\n" +
                                            "    <i class=\"fa fa-angle-left next_to_icon\" style=\"\"></i>\n" +
                                            "    </a>\n" +
                                            "    <hr>\n" +
                                            "</div>"
                                        );
                                    }
                                    else if(v._type == 'posts')
                                    {
                                        $("#search-result-wrapper").append(
                                            "<div class=\"col-md-12 search-result-item\">\n" +
                                            "    <span><i class=\"fa fa-circle\" style=\"font-size:10px; color:blue\"></i></span>&nbsp;&nbsp;\n" +
                                            "    <img class=\"img-circle\" src=\""+data.thumbnail_link+"/"+v._source.id+"\" style=\"width:50px;height:50px;\">&nbsp;&nbsp;&nbsp;\n" +
                                            // "    <span><a href=\""+data.post_link+"/"+v._source.id+"\">"+v._source.title+"</a></span>&nbsp;&nbsp;&nbsp;\n" +
                                            "    <span class=\"notfication_p\">"+v._source.title+"</span> &nbsp;&nbsp;\n" +
                                            "    <a href=\""+data.post_link+"/"+v._source.id+"\">\n" +
                                            "    <i class=\"fa fa-angle-left next_to_icon\" style=\"\"></i>\n" +
                                            "    </a>\n" +
                                            "    <hr>\n" +
                                            "</div>"
                                        );
                                    }
                                });
                                break;
                            default :
                                throw "وضعیت دریافتی از سرور مشخص نیست";
                                break;
                        }

                    }
                    catch (exception)
                    {
                        toastr.error('خطایی نامعلوم در دریافت اطلاعات', 'خطا');
                        return ' ';// this will tell x-editable there were errors.
                    }
                },
                error: function (data1, data2, data3)
                {
                    toastr.error(data3, 'خطا');
                }
            });
        })
    }
});