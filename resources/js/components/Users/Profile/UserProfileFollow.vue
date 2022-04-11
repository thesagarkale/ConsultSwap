<template>
    <div>
        <div class="flex rounded-full cursor-default px-4 py-1 text-sm mt-2 border border-theme-salmon text-theme-salmon" v-if="state.loading">
            <button-spinner color="FA8186" class="mr-2"></button-spinner>Loading
        </div>
        <div class="rounded-full cursor-pointer px-4 py-1 text-sm mt-2" :class="classList" v-if="!state.loading">
            <div v-if="!follows">
                <i class="fa fa-plus mr-2"></i>Follow
            </div>
            <div v-else>
                <i class="fa fa-check mr-2"></i>Following
            </div>
        </div>
    </div>
</template>

<script>
import ButtonSpinner from "../../Common/ButtonSpinner";
export default {
    name: "UserProfileFollow",
    components: {ButtonSpinner},
    props: {
        authUser: {
            type: [Number, String],
            required: true
        },
        followUser: {
            type: [Number, String],
            required: true
        }
    },
    created() {
        this.fetchFollows();
    },
    computed: {
        classList: function () {
            if (this.follows) {
                return "border border-theme-salmon hover:text-theme-salmon hover:bg-transparent bg-theme-salmon text-white"
            } else {
                return "border border-theme-salmon text-theme-salmon hover:bg-theme-salmon hover:text-white";
            }
        }
    },
    data() {
        return {
            state: {
                loading: true
            },
            follows: false
        }
    },
    methods: {
        toggleFollow: function () {
            state.loading = true;

            if (this.follows) {
                axios.delete('/api/followers', {
                    'user_id': this.authUser,
                    'follower_id': this.followUser
                }).then(() => {
                    this.state.loading = true;
                    this.fetchFollows();
                }).catch(() => {
                    this.follows = false;
                    this.state.loading = false;
                });
            } else {
                axios.post('/api/followers', {
                    'user_id': this.authUser,
                    'follower_id': this.followUser
                }).then(() => {
                    this.state.loading = true;
                    this.fetchFollows();
                }).catch(() => {
                    this.follows = false;
                    this.state.loading = false;
                });
            }

        },
        fetchFollows: function () {
            axios.get(`/api/users/${this.authUser}/follows/${this.followUser}`).then(response => {
                this.follows = response.data.result;
            }).then(() => {
                this.state.loading = false;
            }).catch(() => {
                this.follows = false;
                this.state.loading = false;
            })
        }
    },
}
</script>

<style scoped>

</style>