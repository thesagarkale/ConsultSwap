<template>
    <div class="border-t border-b border-l border-gray-200 shadow">
        <textarea class="message-box-textarea" v-model="message" v-on:keydown.enter="send" placeholder="Type your message here ..."></textarea>
    </div>
</template>

<script>
export default {
    name: "MessageBoxCompose",
    data() {
        return {
            message: null
        }
    },
    methods: {
        send: function (e) {
            e.preventDefault();

            if (this.message === null) {
                return;
            }

            this.$emit('send:message', this.message);
            this.message = null;
        }
    },
}
</script>

<style scoped>
.message-box-textarea {
    height: 99%;
    width: 100%;
    border: none;
    margin-top: 0px;
    margin-bottom: 0px;
}
.message-box-textarea:focus{
    border: 1px solid #FA8186;
}
</style>