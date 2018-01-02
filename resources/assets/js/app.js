
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#app'
// });
// $.fn.editable.defaults.mode = 'inline';
$.fn.editableform.buttons =
    '<button type="submit" class="btn btn-primary btn-sm editable-submit">'+
    '<i class="fa fa-check"></i>'+
    '</button>'+
    '<button type="button" class="btn btn-default btn-sm editable-cancel">'+
    '<i class="fa fa-close"></i>'+
    '</button>';
$(document).ready(function() {
    $('#title-box').editable({
        ajaxOptions : {
            url: '/post/edit',
            // data: {},
            type: 'POST'
        },
        success: function(response, newValue) {
            toastr.success("Done");
        },
        error: function(response, newValue) {
            toastr.error('خطا');
        }
    });
    $('#post-content').editable({
        ajaxOptions : {
            url: '/post/edit',
            // data: {},
            type: 'POST'
        },
        success: function(response, newValue) {
            toastr.success("Done");
        },
        error: function(response, newValue) {
            toastr.error('خطا');
        }
    });
});
