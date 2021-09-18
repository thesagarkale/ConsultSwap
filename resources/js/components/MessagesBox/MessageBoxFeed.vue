<template>
    <div class="border-gray-200 border-l">
        <div class="message-box-feed-container" v-if="contact && !loading" ref="feed">
            <div v-for="message in messages" v-bind:key="message.id" class="rounded-b" :class="getClassItem(message)">
                <div class="arrow-left" v-if="message.from.id === contact.id"></div>
                <div class="arrow-right" v-if="message.to.id === contact.id"></div>
                {{message.message}}
            </div>
        </div>
        <tile v-if="loading"></tile>
    </div>
</template>

<script>
import Tile from "../../../../node_modules/vue-spinners/src/components/TileSpinner";
export default {
    name: "MessageBoxFeed",
    components: {Tile},
    props: {
        contact: {
            type: Object
        },
        resetMessages: {
            type: Boolean,
            default: false
        },
        user: {
            type: [String, Number],
            required: true
        }
    },
    mounted() {
        console.log(window.Echo);
        window.Echo.private(`message.` + this.user).listen('NewMessage', (e) => {
            this.handleIncoming(e.message);
        });
    },
    watch: {
        contact(newValue, oldValue) {
            if (newValue === oldValue) {
                return;
            }
            this.loading = true;
            this.fetchMessages();
        },
        message: function () {
            this.scrollToBottom();
        },
        resetMessages: function () {
            if (!this.resetMessages) {
                return;
            }

            this.fetchMessages();
        }
    },
    data() {
        return {
            loading: false,
            messages: [],
        }
    },
    methods: {
        getClassItem: function (message) {
            return message.from.id === this.contact.id ? 'message-item-received rounded-r' : 'message-item-sent rounded-l';
        },
        fetchMessages: function () {
            axios.get('/api/messages', {
                params: {
                    contact_id: this.contact.id
                }
            }).then(response => {
                this.messages = response.data.data;
                this.scrollToBottom();
                this.loading = false;

                if (this.resetMessages) {
                    this.$emit('reset:complete');
                }
            })
        },
        scrollToBottom: function () {
            setTimeout(() => {
                this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
            }, 50)
        },
        handleIncoming: function (message) {
            if (this.contact && this.contact.id === message.from.id) {
                this.messages.push(message);
                this.scrollToBottom();
                return;
            }
            alert('New message from ' + message.from.first_name);
        }
    },
}
</script>

<style scoped>
.message-box-feed-container {
    height: 100%;
    overflow: scroll;
    padding: 1rem;
}

.message-item-received {
    margin-bottom: 1rem;
    width: 50%;
    color: white;
    background: #FA8186;
    padding: 1rem;
    margin-right: auto;
    position: relative;
}

.message-item-sent {
    margin-bottom: 1rem;
    margin-left: auto;
    width: 50%;
    color: black;
    background: lightgray;
    padding: 1rem;
    position: relative;
}

.arrow-right {
    width: 0;
    height: 0;
    border-bottom: 10px solid transparent;
    border-left: 15px solid lightgray;
    position: absolute;
    top: 0;
    right: -15px;
}

.arrow-left {
    width: 0;
    height: 0;
    border-bottom: 10px solid transparent;
    border-right:15px solid #FA8186;
    position: absolute;
    top: 0;
    left: -15px;
}
</style>