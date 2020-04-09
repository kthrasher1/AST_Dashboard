/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

Vue.component('chat-messages', require('./components/chatMessage.vue').default);
Vue.component('chat-form', require('./components/chatForm.vue').default);


import VueChatScroll from 'vue-chat-scroll';
Vue.use(VueChatScroll);

const app = new Vue({
    el: '#app',

    data: {
        messages: []
    },

    created() {
        this.GetMessages();

        Echo.private('chat')
        .listen('MessageSent', (e) => {
            this.messages.push({
            message: e.message.message,
            user: e.user
            });
        });
    },

    methods: {
        GetMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        },

        PostMessage(message) {
            this.messages.push(message);

            axios.post('/messages', message).then(response => {
              console.log(response.data);
            });
        }
    }
});


let slider = document.getElementById("slider");
let img = document.getElementById("emotion-icons");
let text = document.getElementById("emotion-text");

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
