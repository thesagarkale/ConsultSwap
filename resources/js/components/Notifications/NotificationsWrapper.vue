<template>
    <div class="relative">
        <div @click="show = !show" class="relative flex items-center">
            <div class="rounded-full bg-theme-salmon text-white text-sm px-2 text-xs mr-1" v-if="pagination.total">
                {{pagination.total}}
            </div>
            <i class="far fa-bell text-white"></i>
        </div>

        <div v-if="show"
             class="right-0 absolute z-50 mt-2 rounded-md shadow-lg bg-white" style="min-width: 4rem">
            <div class="rounded-md ring-1 ring-black ring-opacity-5" style="width: max-content">
                <div v-for="notification in notifications" class="text-sm p-4 hover:bg-gray-200 rounded-md cursor-pointer" @click="handle(notification)">
                    {{notification.notification}}
                </div>
            </div>
        </div>
        <div class="fixed top-0 right-0 left-0 bottom-0 z-10" v-if="show" @click="show = false"></div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "NotificationsWrapper",
    props: {
        userId: {
            type: [Number, String],
            required: true
        },
    },
    mounted() {
        this.fetchOpenNotifications();
    },
    data() {
        return {
            show: false,
            notifications: {},
            pagination: {}
        }
    },
    methods: {
        fetchOpenNotifications: function () {
            axios.get('/api/notifications', {
                params: {
                    user_id: this.userId,
                    is_read: 0
                }
            }).then(response => {
                this.pagination = response.data.meta;
                this.notifications = response.data.data;
            })
        },
        handle: function (notification) {
            axios.post('/api/notifications/' + notification.id + '/read').then(_ => {
                window.location.replace(notification.url);
            })
        }
    },
}
</script>

<style scoped>

</style>