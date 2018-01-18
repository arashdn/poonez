$(document).ready(function () {
    if ($('#main_view').length>0)
    {
        var app = new Vue({
            el: '#app',
            data : {
                posts : [],
                busy: false,
                loading:1,
                page:1,
            },
            created: function () {
                this.loading = 0;
            },
            methods: {
                loadMore: function() {
                    const vm = this;
                    vm.loading=1;
                    vm.busy=true;
                    vm.getallpost();
                },
                getallpost: function () {
                    const vm = this;
                    $.ajax({
                        url: getPostUrl+'?page='+vm.page,
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
                        success: function (response)
                        {
                            try
                            {
                                if(response.data.length =='0')
                                {
                                    vm.busy=true;
                                }
                                else
                                {
                                    vm.busy = false;
                                }
                                for(var i=0;i<response.data.length;i++) {
                                    vm.posts.push(response.data[i]);
                                }
                                vm.loading=0;
                                vm.page +=1;
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
                // this.getdata();
                // $(".beforload").hide();
                // $(".afterload").show();
            }
        });
    }

});

