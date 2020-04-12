<template>
    <div>
        <div v-for="message in messages" :key="message.id">
            <div>
                <ul class="chat"  >
                    <li class="left clearfix">
                        <div class="chat-body clearfix" >
                            <div class="header">
                                <strong class="primary-font">

                                    {{ message.user.name }}
                                </strong>
                            </div>

                            <p>
                                {{ message.message }}
                            </p>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['messages', 'user', 'user1', 'otheruser', 'otheruser1'],

    };

</script>
