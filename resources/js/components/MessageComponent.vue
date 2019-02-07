<template>
        <div class="message" :class="{ 'self': message.selfMessage }" id="message-body">
            <strong class="user" id="username-id">{{message.user.name}}: </strong>
            <p class="body">{{message.body}}</p>
            <p class="createdat">{{message.created_at}}</p>
        </div>
</template>

<script>

    export default {
        props: ['message']
    }
</script>


