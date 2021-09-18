<template>
    <div class="conversations rounded-tl rounded-bl">
        <div class="p-4 conversations-selected-contact bg-white border-t border-l border-b border-gray-200">
            <p :class="{'font-bold': contact}">
                {{ contact ? contact.first_name + ' ' + contact.last_name : 'Please select a contact'}}
            </p>
        </div>
        <div class="" style="height: 89.6%;">
            <message-box-feed
                style="height: 80%"
                :contact="contact"
                :messages="messages"
                :reset-messages="resetMessages"
                @reset:complete="resetMessages = false"
                :user="user"
            ></message-box-feed>
            <message-box-compose style="height: 19.8%" @send:message="sendMessage"></message-box-compose>
        </div>
    </div>
</template>

<script>
import MessageBoxFeed from "./MessageBoxFeed";
import MessageBoxCompose from "./MessageBoxCompose";
export default {
    name: "MessagesBoxConversation",
    components: {MessageBoxCompose, MessageBoxFeed},
    props: {
        contact: {
            type: Object
        },
        messages: {
            type: Array
        },
        user: {
            type: [String, Number],
            required: true
        }
    },
    data() {
        return {
            resetMessages: false
        }
    },
    methods: {
        sendMessage: function (message) {
            if (this.contact === null) {
                return;
            }

            axios.post('/api/messages', {
                'to': this.contact.id,
                'message': message
            }).then(response => {
                this.resetMessages = true;
            })
        }
    },
}
</script>

<style scoped>
.conversations {
    height: 75vh;
}
</style>