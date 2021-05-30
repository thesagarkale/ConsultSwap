<template>
    <div class="phase-on animate__animated animate__fadeIn" :class="{ 'animate_fadeOut' : state.transitionOut }">
        <div>
            <span class="big animate__animated animate__fadeIn font-extralight text-white flex items-center">
                <span class="mr-3" style="font-family: 'Suez One', serif">Welcome to</span>
                <application-logo font-size="4" color="FA8186"></application-logo>
            </span>
        </div>
        <div>
            <span class="big-sm animate__animated animate__fadeIn text-white font-extralight">You are joining us as?</span>
            <div class="mb-6 animate__animated animate__fadeIn flex mt-2">
                <div class="capitalize mt-4 mr-4 pl-5
                                pr-5 pt-2 pb-2 border rounded-full border-white text-white hover:bg-red-400
                                hover:border-red-400 cursor-pointer font-extralight"
                     :class="{'bg-red-400 border-red-400': selected === 'consultant'}"
                     style="font-size: 2rem"
                     @click="selected = 'consultant'">
                    Consultant
                </div>
                <div class="capitalize mt-4 mr-4 pl-5
                                pr-5 pt-2 pb-2 border rounded-full border-white text-white hover:bg-red-400
                                hover:border-red-400 cursor-pointer font-extralight"
                     :class="{'bg-red-400 border-red-400': selected === 'consultee'}"
                     style="font-size: 2rem"
                     @click="selected = 'consultee'">
                    Consultee
                </div>
            </div>
            <div class="font-bold text-red-500 text-xl mb-6 animate__animated animate__fadeIn" v-if="state.error">
                Something bad happened! Please try again!
            </div>
            <div class="font-extralight text-red-500">Note: You can change your choice from user settings anytime!</div>
        </div>
        <div class="flex justify-end mt-4">
            <i class="fas fa-arrow-right text-red-400 cursor-pointer" @click="submit()"
               style="font-size: 4rem"></i>
        </div>
    </div>
</template>

<script>
import ApplicationLogo from "../ApplicationLogo";

;
export default {
    name: "PhaseOne",
    components: {ApplicationLogo},
    props: {
        userId: {
            type: [Number, String],
            required: true
        },
    },
    data() {
        return {
            state: {
                error: false,
                transitionOut: false
            },
            selected: 'consultant'
        }
    },
    methods: {
        submit() {
            axios.post('/api/users/' + this.userId + '/metadata', {
                'meta_key': 'user_type',
                'meta_value': this.selected
            }).then(() => {
                this.state.transitionOut = true;
            }).then(() => {
                this.$emit('transition', 'phase-two');
            }).catch(() => {
                this.state.error = true;
            })
        }
    },
}
</script>

<style scoped>
.big-lg {
    font-size: 6rem;
}

.big {
    font-size: 4rem;
}

.big-sm {
    font-size: 3rem;
}
</style>
