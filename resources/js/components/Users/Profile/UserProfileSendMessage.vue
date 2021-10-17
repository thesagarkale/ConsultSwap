<template>
    <div>
        <div class="rounded-full cursor-pointer border border-theme-salmon text-theme-salmon
                            hover:bg-theme-salmon px-4 py-1 hover:text-white text-sm ml-2 mt-2" @click="state.show = true">
            <i class="fas fa-comment-alt mr-2"></i>Send message
        </div>
        <div class="modal" v-if="state.show">
            <div class="modal-container">
                <spinner :show="spinner.show" :complete="spinner.complete"></spinner>
                <div class="modal-header">
                    <div class="flex justify-between w-full">
                        <div v-on:click="resetAndClose"><i class="fa fa-times text-sm"></i></div>
                        <div class="text-sm">Send a message to {{toUser.first_name}}</div>
                        <div></div>
                    </div>
                </div>
                <div class="modal-body">
                    <ul class="text-sm text-red-400">
                       <li class="list-disc list-inside" v-for="message in errorMessages">{{message}}</li>
                    </ul>
                    <div class="flex flex-col">
                        <label for="description" class="text-sm pb-1 pt-4 text-gray-400 font-bold">Message</label>
                        <textarea id="description"
                                  v-model="message"
                                  class="h-40 input-default"
                                  type="text" placeholder="Type you message here ..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-full flex justify-end">
                        <button class="px-3 py-1 bg-theme-salmon rounded-full text-white font-light text-sm focus:ring-0"
                                @click="send">
                            Send
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-overlay" @click="resetAndClose"></div>
        </div>
    </div>
</template>

<script>
import Spinner from "../../Common/Spinner";
export default {
    name: "UserProfileSendMessage",
    components: {Spinner},
    props: {
        toUser: {
            type: Object,
            required: true
        },
        fromUser: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            state: {
                loading: false,
                show: false
            },
            message: null,
            errorMessages: [],
            spinner: {
                show: false,
                complete: false
            }
        }
    },
    methods: {
        resetAndClose: function () {
            this.message = null;
            this.spinner.show = false;
            this.spinner.complete = false;
            this.state.show = false;
        },
        send: function () {
            if (this.message === '' || this.message === null) {
                this.errorMessages.push("Message cannot be empty.");
            }

            this.spinner.show = true;

            axios.post('/api/messages', {
                to: this.toUser.id,
                message: this.message
            }).then(_ => {
                this.spinner.complete = true;
            }).then(_ => {
                setTimeout(() => {
                    this.resetAndClose();
                }, 1000);
            });
        }
    },
}
</script>

<style scoped>

</style>