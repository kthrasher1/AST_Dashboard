<template>
    <div class="conversation">
            <div class="convo-container">
                <div class="icon" @click="back">  <i class="fas fa-arrow-left" id="i"></i> </div>
                 <h1 class="title"> {{contact ? contact.name : 'Select a contact' }}  </h1>
            </div>
        <MessageFeed :contact="contact" :messages="messages" />
        <MessageInput @send="sendMessage" />
    </div>
</template>


<script>
import MessageFeed from './MessageFeed';
import MessageInput from './MessageInput';

export default {
    props: {
        contact: {
            type: Object,
            default: null,
        },
        messages: {
            type: Array,
            default: []
        },
    },

    methods: {
        sendMessage(text) {
            if (!this.contact) {
                return;
            }
            axios.post('/conversation/send', {
                contact_id: this.contact.id,
                text: text
            }).then((response) => {
                this.$emit('new', response.data);
            })
        },

        back(){
            this.$emit('back', true);
        },
    },
    components: {MessageFeed, MessageInput}
}
</script>


<style lang="scss" scoped>

.conversation{
    flex: 5;
    display: flex;
    flex-direction: column;
    justify-content: space-between;

    .convo-container{
        width: 100%;
        border-bottom: 2px solid whitesmoke;
        font-size: 20px;
        display: grid;
        grid-template-columns: 0.5fr 2fr;
        grid-template-rows: 0.5fr;
        grid-column-gap: 0px;
        grid-row-gap: 0px;

        .icon{
            grid-area: 1 / 1 / 2 / 2;
            display: none;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            padding: 15px;
            margin-left: 10px;
            margin-right: 30px;
            align-self: center;
            background: whitesmoke;
            border-radius: 100%;
            height: 30px;
            width: 30px;
            position: relative;
            cursor: pointer;

            #i{
                cursor: pointer;
            }

        }

        .avatar{
            display: none;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: auto;
            margin-right: 20px;

            img{
                width: 45px;
                height: 45px;
                border-radius: 100%;
                box-shadow: 0px 3px 15px rgba(0,0,0,0.1);
            }
        }

        .title{
            grid-area: 1 / 1 / 2 / 3;
            justify-self: center;
            align-self: center;
            position: relative;
            margin: 0;
            padding: 15px;
            font-size: 24px;
            text-transform: capitalize;
            text-align: center;
        }
    }

}
@media screen and (max-width: 600px){
    .conversation{
        max-height: calc(100vh - 11rem);
        .convo-container{
            .avatar{
                display: flex;
            }
            .icon{
                display: flex;
            }
        }
    }
}

</style>
