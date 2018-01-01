var app = new Vue({
    el: '#app',
    data : {
        posts : {},
    },
    methods: {
        getdata : function()
        {
            var that = this;
            $.ajax({
                url: '/post/all',
                type: 'GET',
                // data: $.param(data),
                beforeSend:function()
                {
                    $(".beforload").show();
                },
                complete: function()
                {
                    $(".beforload").hide();
                },
                success: function (data)
                {
                    try
                    {
                        that.posts = data;
                    }
                    catch (exception)
                    {
                        toastr.error('خطایی نامعلوم در دریافت اطلاعات', 'خطا');
                        console.log(exception);
                    }
                },
                error: function (data1, data2, data3)
                {
                    toastr.error(data3, 'خطا');
                }
            });
        },
        sidenav :function(){
            $('#mysidenav').toggleClass('showsidenav');
            $('.background-sidenav').toggleClass('background-sidenavshow');
        }
    },
    mounted(){
        this.getdata();
        // $(".beforload").hide();
        $(".afterload").show();
    }
});


