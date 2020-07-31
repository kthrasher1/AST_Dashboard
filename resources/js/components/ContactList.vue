<template>
    <div class="contacts-list" >
        <ul class="contact-ul" v-for="(contact, index) in contacts" :key="contact.id" @click="UserSelected();" >
            <li class="contact-li" @click="selectedContact(index, contact);" :class="{ 'selected': index == selected }"  >
                <div class="avatar">
                    <img :src="'/uploads/avatars/' + contact.avatar" :alt="contact.name">
                </div>
                <div class="contact">
                    <p class="user-name">{{ contact.name }}</p>
                </div>

                <div class="notificationUnread" v-if="contact.unread"><p>{{ contact.unread }}</p></div>

            </li>

        </ul>
    </div>
</template>


<script>
export default {
    props: {
        contacts: {
            type: Array,
            default: []
        },
    },

    data() {
        return {
            selected: 0,
        };
    },


    methods: {
        selectedContact(index, contact){
            this.selected = index;
            this.$emit('selected', contact);
        },

        UserSelected(){
            this.$emit('userselected', true);
        }
    }


}
</script>


<style lang="scss" scoped>

    .contacts-list{
        flex: 2;
        min-height: 700px;
        overflow-y: show;
        border-right: 2px solid darken(whitesmoke, $amount: 10);

        .contact-ul{
            margin-left: 0;
            list-style-type: none;
            padding-left: 0;
            .contact-li{
                display: flex;
                padding: 2px;
                border-bottom: 1px solid whitesmoke;
                height: 90px;
                position: relative;
                cursor: pointer;

                &.selected{
                    background: whitesmoke;
                }

                .contact{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 100%;
                    .user-name{
                        margin-bottom: 0px;
                        margin-left: 20px;
                        font-weight: bold;
                        text-transform: capitalize;
                    }
                }

                .avatar{
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 45px;
                    height: auto;
                    margin-left: 20px;

                    img{
                        width: 45px;
                        height: 45px;
                        border-radius: 100%;
                        box-shadow: 0px 3px 15px rgba(0,0,0,0.1);
                    }
                }

                .notificationUnread{
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    float: right;
                    position: relative;
                    width: 100%;


                    p{
                        display: flex;
                        align-items: center;
                        justify-content: center;

                        margin-bottom: 0px;
                        margin-left: 10px;
                        background: #ff5470;
                        color: white;
                        border-radius: 100%;
                        position: relative;
                        width: 30px;
                        height: 30px;

                    }
                }


            }

        }

    }

    @media screen and (max-width: 600px){
        .contacts-list{
            min-height: calc(100vh - 12rem);
        }
    }
</style>
