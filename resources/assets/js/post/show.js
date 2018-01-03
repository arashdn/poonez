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
    });
}