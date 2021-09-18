<template>
    <div class="flex flex-wrap overflow-hidden">
        <div class="w-2/3 overflow-hidden">
            <messages-box-conversations
                :contact="selectedContact"
                :messages="messages"
                :user="user"
            ></messages-box-conversations>
        </div>
        <div class="w-1/3 overflow-hidden">
            <messages-box-contacts :contacts="availableContacts"
                                   :selected-contact="selectedContact"
                                   @contact:selected="handleContactSelected">
            </messages-box-contacts>
        </div>
    </div>
</template>

<script>
import MessagesBoxConversations from "./MessagesBoxConversations";
import MessagesBoxContacts from "./MessagesBoxContacts";
export default {
    name: "MessagesBox",
    components: {MessagesBoxContacts, MessagesBoxConversations},
    props: {
        user: {
            type: [Number, String],
            required: true
        },
    },
    created() {
        this.fetchAvailableContacts();
    },
    data() {
        return {
            selectedContact: null,
            availableContacts: [],
            messages: []
        }
    },
    methods: {
        fetchAvailableContacts: function () {
            axios.get('/api/contacts').then(response => {
                this.availableContacts = response.data.data
            });
        },
        handleContactSelected: function (data) {
            this.selectedContact = data;
        }
    },
}
</script>

<style scoped>

</style>