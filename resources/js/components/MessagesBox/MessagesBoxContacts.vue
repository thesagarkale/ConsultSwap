<template>
    <div class="contact-list shadow bg-white rounded-tr rounded-br border border-gray-200">
        <div class="p-4 border-b border-gray-200 font-bold">
            Conversations
        </div>
        <div class="contact-list-items-container">
            <div v-for="(contact, key) in contacts"
                 class="contact-list-item flex p-4 hover:bg-gray-200 cursor-pointer"
                 :class="{'border-b border-gray-200': contacts.length - 1 > key, 'bg-gray-200': isSelected(contact.username)}"
                 v-bind:key="key" @click="$emit('contact:selected', contact)">
                <div class="contact-list-item-profile-image">
                    <i class="fas fa-user fa-1x text-gray-400 bg-gray-200 p-2 rounded-full"></i>
                </div>
                <div class="pl-4">
                    <div class="contact-list-item-name text-sm font-bold">
                        {{ contact.first_name }} {{ contact.last_name }}
                    </div>
                    <div class="contact-list-item-username text-xs italic text-gray-500">@{{ contact.username }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "MessagesBoxContacts",
    props: {
        contacts: {
            type: Array,
            required: true
        },
        selectedContact: {
            type: Object
        }
    },
    methods: {
        isSelected: function (username) {
            return this.selectedContact ? this.selectedContact.username === username : false;
        }
    },
}
</script>

<style scoped>
.contact-list-item-profile-image {
}

.contact-list-items-container {
    height: 67vh;
    overflow-y: scroll;
    overflow-x: hidden;
}

.contact-list {


}
</style>