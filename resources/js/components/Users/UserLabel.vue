<template>
    <div v-if="user !== null" class="flex items-center">
        <div class="relative bg-gray-200 rounded-full max-w-min">
            <i class="fa fa-user-alt p-2 fa-xs"></i>
        </div>
        <div class="text-sm text-gray-500 ml-2">
            {{user.first_name}} {{user.last_name}}
        </div>
    </div>
</template>

<script>
export default {
    name: "UserLabel",
    props: {
        userId: [String, Number]
    },
    created() {
        this.fetchUser();
    },
    data() {
        return {
            user: null
        }
    },
    methods: {
        fetchUser: function () {
            axios.get('/api/users/' + this.userId).then(response => {
                this.user = response.data
            });
        }
    },
}
</script>

<style scoped>

</style>