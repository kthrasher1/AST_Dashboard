<template>
    <div class="chat-app">
        <ContactList :contacts="contacts" @selected="startConversation" @userselected="ShowFunction($event)" v-if="back"/>
        <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage" @back="backFunction($event)" v-if="userSelected" />

    </div>
</template>

<script>
import Conversation from './Conversation';
import ContactList from './ContactList';

export default {
    props:{
        user: {
            type: Object,
            required: true
        },

    },
    data(){
        return {
            back: true,
            userSelected: false,
            selectedContact: null,
            messages: [],
            contacts: []
        };
    },
    mounted() {

        Echo.private(`messages${this.user.id}`)
            .listen('NewMessage', (e) =>{
                this.handleMessage(e.message);
            });

        axios.get('/contact')
            .then((response) => {
                this.contacts = response.data;
            });


    },

    methods: {
        startConversation(contact){
            this.updateRead(contact, true);
            axios.get(`/conversation/${contact.id}`)
                .then((response) =>{
                    this.messages = response.data;
                    this.selectedContact = contact;
                });
        },

        ShowFunction(toggleConvo){

            if(this.isMobile()){
                this.back = false;
                this.userSelected = toggleConvo;
            }
            else {

            }

        },

        backFunction(toggleback){
             if(this.isMobile()){
                this.back = toggleback;
                this.userSelected = false;
            }
            else {

            }
        },

        saveNewMessage(message){
            this.messages.push(message);
        },

        handleMessage(message){
            if(this.selectedContact && message.from == this.selectedContact.id){
                this.saveNewMessage(message);
                return;
            }

            this.updateRead(message.contact, false);

        },

        updateRead(contact, read){
            this.contacts = this.contacts.map((single) =>{
                if(single.id != contact.id){
                    return single;
                }

                if(read){
                    single.unread = 0;
                }
                else{
                    single.unread += 1;
                }

                return single;
            })
        },

        isMobile() {
            if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                return true
            } else {
                return false
            }
        }


    },

    created() {
        if(this.isMobile()){
            this.userSelected = false;
        }
        else{
            this.userSelected = true;
        }
    },

    components: {Conversation, ContactList}
}
</script>

<style lang="scss" scoped>
    .chat-app{
        display: flex;
    }
</style>
