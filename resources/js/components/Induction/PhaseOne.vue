<template>
    <div class="phase-on animate__animated animate__fadeIn" :class="{ 'animate_fadeOut' : state.transitionOut }">
        <div>
            <span class="big-lg animate__animated animate__bounceInDown font-bold" style="color: #818cf7">Hello!</span>
            <span class="big ml-6 animate__animated animate__bounceInDown font-extralight text-white">Welcome to <span class="text-indigo-400 font-light">Consultpeer</span></span>
        </div>
        <div>
            <span class="big text-white font-extralight">You are joining us as?</span>
            <div class="mb-6">
                <span class="big-sm text-white font-light hover:text-indigo-400 cursor-pointer " :class="{'underline text-indigo-400 italic font-bold': selected === 'consulter'}" @click="selected = 'consulter'">Consulter</span>
                <span class="big-sm text-white font-light hover:text-indigo-400 cursor-pointer ml-8" :class="{'underline text-indigo-400 italic font-bold': selected === 'consultee'}" @click="selected = 'consultee'">Consultee</span>
            </div>
            <div class="font-bold text-red-500 text-xl mb-6 animate__animated animate__fadeIn" v-if="state.error">Something bad happened! Please try again!</div>
            <div class="font-extralight text-red-500">Note: You can change your choice from user settings anytime!</div>
        </div>
        <div class="flex justify-end mt-4">
            <i class="fas fa-arrow-right text-indigo-400 cursor-pointer" @click="submit()"
               style="font-size: 4rem"></i>
        </div>
    </div>
</template>

<script>
export default {
    name: "PhaseOne",
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
            selected: 'consulter'
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
