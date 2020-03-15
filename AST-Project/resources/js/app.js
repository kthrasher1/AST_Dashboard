/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');




//Vue.forceUpdate();

Vue.component('chat-messages', require('./components/chatMessage.vue').default);
Vue.component('chat-form', require('./components/chatForm.vue').default);

import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)


const app = new Vue({
    el: '#app',

    data: {
        messages: []
    },

    created() {
        this.GetMessages();
        this.$forceUpdate();

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
