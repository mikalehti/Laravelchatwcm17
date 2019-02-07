<template>
    <form class="form">
        <!-- Emoji Picker -->
        <emoji-picker @emoji="insert">
        <div
            class="emoji-invoker"
            slot="emoji-invoker"
            slot-scope="{ events }"
            v-on="events">
            <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0h24v24H0z" fill="none"/>
            <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
            </svg>
        </div>
        <div slot="emoji-picker" slot-scope="{ emojis, insert, display }">
            <div class="emoji-picker" :style="{ top: display.y + 'px', left: display.x + 'px' }">
                <div class="emoji-picker__search">
                </div>
                    <div>
                        <div v-for="(emojiGroup, category) in emojis" :key="category">
                            <h5>{{ category }}</h5>
                            <div class="emojis">
                                <span
                                v-for="(emoji, emojiName) in emojiGroup"
                                :key="emojiName"
                                @click="insert(emoji)"
                                :title="emojiName"
                                >{{ emoji }}</span>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </emoji-picker>

        <!-- Input field for text and emojis -->
        <textarea
            id="body"
            cols="28"
            rows="5"
            class="form-input"
            @keydown="typing"
            v-model="body">
        </textarea>

        <!-- Send button  -->
        <span class="notice">
            <button v-on:click="send" title="Click the button or press enter to send a message." class="btn btn-primary float-right" method=@submit.prevent>Send</button>
        </span>
    </form>
</template>

<script>
    import EmojiPicker from 'vue-emoji-picker';
    import Event from '../event.js';



    export default {
        data() {
            return {
                body: null
            }
        },
        components: {
            EmojiPicker
        },
        methods: {
            insert(emoji) {
                this.body += emoji
            },
            //PREVENTING DEFAULTS WHEN KEY 13 (ENTER) OR SHIFT IS PRESSED. SENDING THE MESSAGE.
            typing(e) {
                if(e.keyCode === 13 && !e.shiftKey) {
                    e.preventDefault();
                    this.sendMessage();
                }
            },
            send(e){
                e.preventDefault();
                    this.sendMessage();
            },
            //RETURN THE MESSAGE OBJECT IF SUCCESSFUL
            sendMessage() {
                if(!this.body || this.body.trim() === '') {
                    return
                }
                let messageObj = this.buildMessage();
                Event.$emit('added_message', messageObj);
                    axios.post('/message', {
                        body: this.body.trim()
                    }).catch(() => {
                        console.log('GÖR OM GÖR RÄTT');
                    });
                    this.body = null;
                },
            buildMessage() {
                return {
                    id: Date.now(),
                    body: this.body,
                    selfMessage: true,
                    user: {
                        name: Laravel.user.name
                    }
                }
            }
        }
    }
</script>

