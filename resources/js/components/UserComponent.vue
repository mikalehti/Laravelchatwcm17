<template>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header" id="chat-room-header">Online Users <span class="blink fa fa-circle"></span></div>
            <div class="card-body">
                <div class="users" v-for="user in users" :key="user.id">
                    <b>{{ user.name }}</b>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import Event from '../event.js';
    export default {

        data() {
            return {
                users: []
            }
        },
        //TRIGGERING A EVENT BASED ON IF THE USER IS ONLINE, IS LOGGING ON OR IS LEAVING
        //AND UPDATES THE ONLINE USERS LIST ACCORDINGLY.
        mounted() {
            Event.$on('users.here', (users) => {
                this.users = users;
            })
            .$on('users.joined', (user) => {
                this.users.unshift(user);
            })
            .$on('users.left', (user) => {
                this.users = this.users.filter(u => {
                    return u.id != user.id
                });
            });
        }
    }
</script>


