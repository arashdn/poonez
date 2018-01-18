if($('#profile-container').length > 0)
{
    $(document).ready(function ()
    {
        $('#btn-follow').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('href'),
                type: 'POST',
                // data: $.param({
                //     'pid':$(that).data('pid'),
                // }),
                beforeSend:function()
                {
                    $('#btn-follow').hide();
                },
                complete: function()
                {
                    // $('#btn-follow').show();
                },
                success: function (data)
                {
                    try
                    {
                        switch(data.status)
                        {
                            case 'error':
                                toastr.error(data.message, 'خطا');
                                $('#btn-follow').show();
                                break;
                            case 'access_error':
                                toastr.error(data.message, 'خطا');
                                $('#btn-follow').show();
                                break;
                            case 'ok':
                                toastr.success(data.message);
                                $('#btn-follow').hide();
                                $('#btn-unfollow').show();
                                $('#follower-count').html(data.follower_count);
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

        $('#btn-unfollow').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('href'),
                type: 'POST',
                // data: $.param({
                //     'pid':$(that).data('pid'),
                // }),
                beforeSend:function()
                {
                    $('#btn-unfollow').hide();
                },
                complete: function()
                {
                    // $('#btn-unfollow').show();
                },
                success: function (data)
                {
                    try
                    {
                        switch(data.status)
                        {
                            case 'error':
                                toastr.error(data.message, 'خطا');
                                $('#btn-unfollow').show();
                                break;
                            case 'access_error':
                                toastr.error(data.message, 'خطا');
                                $('#btn-unfollow').show();
                                break;
                            case 'ok':
                                toastr.success(data.message);
                                $('#btn-unfollow').hide();
                                $('#btn-follow').show();
                                $('#follower-count').html(data.follower_count);
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