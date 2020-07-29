/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

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


let slider = document.getElementById("slider");
let img = document.getElementById("emotion-icons");
let text = document.getElementById("emotion-text");

if(slider != null){
    slider.oninput = function()
    {

        if(slider.value == 1)
        {
            img.src="img/very-sad.svg";
            text.innerHTML = "Really Bad!";

        }
        else if(slider.value == 2)
        {
            img.src="img/kinda-sad.svg";
            text.innerHTML = "Not Great";
        }
        else if(slider.value == 3){
            img.src = "img/neutral.svg";
            text.innerHTML = "Okay";
        }
        else if(slider.value == 4){

            img.src = "img/kinda-happy.svg";
            text.innerHTML = "Pretty Okay";
        }
        else if(slider.value == 5){
            img.src = "img/very-happy.svg";
            text.innerHTML = "Amazing!";
        }
    }
}
