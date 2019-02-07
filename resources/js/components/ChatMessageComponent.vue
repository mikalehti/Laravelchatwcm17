<template>
    <div class="message-area" ref="message">
        <message-component
            v-for="message in messages"
            :key="message.id"
            :message="message">
        </message-component>
    </div>
</template>

<script>
import Event from '../event.js';

export default {
    data() {
        return {
            messages: []
        }
    },
    //FETCHES THE JSON FILE AND RETURN THE MESSAGE DATA IT HOLDS
    mounted() {
        axios.get('/message').then((response) => {
            this.messages = response.data;
        });
        Event.$on('added_message', (message) => {
            this.messages.unshift(message);
            if (message.selfMessage) {
                this.$refs.message.scrollTop = 0;
            }
        });
    }
}
</script>

