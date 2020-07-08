/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./slider');

window.Vue = require('vue');

Vue.component('chat-app', require('./components/ChatApp.vue').default);

const app = new Vue({
    el: '#app',
});


$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
});

$('.load-ajax-modal').click(function(){
    $.ajax({
        type : 'GET',
        url : $(this).data('path'),

        success: function(result) {
            $('#student-quick-view div.modal-body').html(result);
        }
    });
});

// $('a[data-notif-id]').click(function () {

//     var notif_id   = $(this).data('notifId');
//     var targetHref = $(this).data('href');

//     $.post('/markedNotification', {'notif_id': notif_id}, function (data) {
//         data.success ? (window.location.href = targetHref) : false;
//     }, 'json');

//     return false;
// });
