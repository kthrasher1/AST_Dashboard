<template>
    <div class="feed" ref="feed">
        <ul class="feed-ul" v-if="contact">
            <li class="feed-li" v-for="message in messages" :class="`message${message.to == contact.id ? ' sent' : ' received'}`" :key="message.id" >
                <div class="content">
                    {{ message.content }}
                </div>
            </li>
        </ul>
    </div>
</template>


<script>
export default {
    props: {
        contact: {
            type: Object
        },
        messages: {
            type: Array,
            required: true
        }
    },

    methods: {
        scrollToBottom(){
            setTimeout(() =>{
                this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
            }, 50);
        }
    },

    watch: {
        contact(contact){
            this.scrollToBottom();
        },
        messages(messages){
            this.scrollToBottom();
        }
    }
}
</script>


<style lang="scss" scoped>

    .feed{
        background: white;
        height: 100%;
        overflow-y: scroll;
        max-height: 550px;
        min-height: 550px;

        ul{
            list-style-type: none;
            padding: 15px;
            margin: 5px;

            li{
                .message{
                    margin: 10px, 0;
                    max-width: 5px;
                }

            }

            .content{

                max-width: 250px;
                border-radius: 5px;
                padding: 10px;
                display: inline-block;
            }


            .sent{
                text-align: right;
                margin-bottom: 10px;
                .content{
                    background: darken(whitesmoke, $amount: 5);
                }

            }


            .received {
                text-align: left;
                margin-bottom: 10px;

                .content{
                    background: darken(whitesmoke, $amount: 10);
                }
            }

        }

    }

    @media screen and (max-width: 480px){
        .feed{
             min-height: calc(100vh - 20rem);
        }
    }

</style>
