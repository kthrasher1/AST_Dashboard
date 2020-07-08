<template>
    <div class="box">
        <textarea class="input" v-model="message" @keydown.enter="send" placeholder="Type here..."></textarea>
        <button class="btn btn-primary send-btn" @click="send"> Send </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: ''
        }
    },
    methods: {
        send(e) {
            e.preventDefault();
            if(this.message == ''){
                return;
            };

            this.$emit('send', this.message);
            this.message = '';
        }
    }
}
</script>


<style lang="scss" scoped>

    .box{
        background: whitesmoke;
        display: flex;
        justify-content: center;
        align-items: center;
        .input{
                width: 76%;
                margin: 10px;
                margin-right: 0px;
                resize: none;
                border-radius: 5px;
                border: 2px solid whitesmoke;
                padding: 5px;
            }

        .send-btn{
            margin: 10px;
        }

    }

</style>
