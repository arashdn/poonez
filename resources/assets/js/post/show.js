if($('#post-show-div').length > 0)
{
    // $.fn.editable.defaults.mode = 'inline';
    $.fn.editableform.buttons =
        '<button type="submit" class="btn btn-primary btn-sm editable-submit">'+
        '<i class="fa fa-check"></i>'+
        '</button>'+
        '<button type="button" class="btn btn-default btn-sm editable-cancel">'+
        '<i class="fa fa-close"></i>'+
        '</button>';

    $(document).ready(function ()
    {
        $('#post-title').editable({
            ajaxOptions : {
                url: '/post/edit',
                // data: {},
                type: 'POST'
            },
            success: function(data, newValue) {
                try
                {
                    switch(data.status)
                    {
                        case 'error':
                            toastr.error(data.message, 'خطا');
                            return ' ';// this will tell x-editable there were errors.
                            break;
                        case 'access_error':
                            toastr.error(data.message, 'خطا');
                            return ' ';// this will tell x-editable there were errors.
                            break;
                        case 'ok':
                            toastr.success(data.message);
                            break;
                        default :
                            throw "وضعیت دریافتی از سرور مشخص نیست";
                            return ' ';// this will tell x-editable there were errors.
                            break;
                    }

                }
                catch (exception)
                {
                    toastr.error('خطایی نامعلوم در دریافت اطلاعات', 'خطا');
                    return ' ';// this will tell x-editable there were errors.
                }
            },
            error: function(data, newValue) {
                toastr.error('خطا');
            }
        });
        $('#post-content').editable({
            ajaxOptions : {
                url: '/post/edit',
                // data: {},
                type: 'POST'
            },
            success: function(data, newValue) {
                try
                {
                    switch(data.status)
                    {
                        case 'error':
                            toastr.error(data.message, 'خطا');
                            return ' ';// this will tell x-editable there were errors.
                            break;
                        case 'access_error':
                            toastr.error(data.message, 'خطا');
                            return ' ';// this will tell x-editable there were errors.
                            break;
                        case 'ok':
                            toastr.success(data.message);
                            break;
                        default :
                            throw "وضعیت دریافتی از سرور مشخص نیست";
                            return ' ';// this will tell x-editable there were errors.
                            break;
                    }

                }
                catch (exception)
                {
                    toastr.error('خطایی نامعلوم در دریافت اطلاعات', 'خطا');
                    return ' ';// this will tell x-editable there were errors.
                }
            },
            error: function(data, newValue) {
                toastr.error('خطا');
            }
        });

        $('#post-delete').on('click', function (e) {
            e.preventDefault();
            var that = this;
            $.confirm({
                title: 'حذف!',
                content: 'آیا از حذف پست اطمینان دارید؟',
                rtl:true,
                buttons: {
                    confirm: {
                        'action': function () {
                            $.ajax({
                                url: $(that).attr('href'),
                                type: 'POST',
                                // data: $.param(data),
                                // beforeSend:function()
                                // {
                                //     $(".beforload").show();
                                // },
                                // complete: function()
                                // {
                                //     $(".beforload").hide();
                                // },
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
                                                // toastr.success(data.message);
                                                window.location = data.redirect;
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
                        },
                        keys: ['enter', 'shift'],
                        btnClass: 'btn-red',
                        'text': 'بله',
                    },
                    cancel: {
                        'action':function () {
                            //$.alert('Canceled!');
                        },
                        'text': 'خیر',
                    },
                }
            });
        });

        $('#btn-send-comment').on('click', function (e) {
            e.preventDefault();
            var that = this;
            $.ajax({
                url: $(that).attr('href'),
                type: 'POST',
                data: $.param({
                    'pid':$(that).data('pid'),
                    'body':$('#sent-comment-body').val()
                }),
                beforeSend:function()
                {
                    $(that).hide();
                },
                complete: function()
                {
                    $(that).show();
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
                                toastr.success(data.message);
                                $('#sent-comment-body').val('');
                                var s = "<div class=\"col-md-12\">\n" +
                                    "    <img class=\"img-circle\" src=\"http://placehold.it/350x700\" width=\"50px\" height=\"50px\">&nbsp;&nbsp;\n" +
                                    "    <a href=\"#\">"+data.user_name+"</a><br>\n" +
                                    "    <br><p>"+data.body+"</p>\n" +
                                    "    <hr>\n" +
                                    "</div>";
                                $('#post-comments').append(s);
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
        });

        $("#btn-poonez").on('click', function (e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('href'),
                type: 'POST',
                data: $.param({
                    'pk':$(this).data('pk'),
                    'name':'pin',
                }),
                beforeSend:function()
                {
                    $(e).hide();
                },
                complete: function()
                {
                    $(e).show();
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
                                var pin_cnt = data.state.split(',')[1];
                                var type = data.state.split(',')[0];
                                if( type == 'pin-add')
                                {
                                    $("#btn-icon-poonez").removeClass('fa-thumb-tack');
                                    $("#btn-icon-poonez").addClass('fa-undo');
                                }
                                else if( type == 'pin-remove')
                                {
                                    $("#btn-icon-poonez").removeClass('fa-undo');
                                    $("#btn-icon-poonez").addClass('fa-thumb-tack');
                                }
                                $("#pin-count").html(pin_cnt);
                                toastr.success(data.message);
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
        });
    });


}