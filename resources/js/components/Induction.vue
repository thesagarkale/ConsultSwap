<template>
    <div class="c-Induction" v-if="show">
        <div class="fixed left-0 right-0 bottom-0 top-0 bg-black opacity-90 z-0"></div>
        <div class="c-Induction_container overflow-scroll fixed left-0 right-0 bottom-0 top-0 p-4 flex flex-col justify-center">
            <phase-one :user-id="userId" v-if="activePhase === 'phase-one'" @transition="handleTransition"></phase-one>
            <phase-two :user-id="userId" v-if="activePhase === 'phase-two'" @transition="handleTransition"></phase-two>
            <phase-three :user-id="userId" v-if="activePhase === 'phase-three'" @transition="handleTransition"></phase-three>
        </div>
    </div>
</template>
<script>
import PhaseOne from "./Induction/PhaseOne";
import PhaseTwo from "./Induction/PhaseTwo";
import PhaseThree from "./Induction/PhaseThree";

export default {
    name: "Induction",
    components: {PhaseOne, PhaseTwo, PhaseThree},
    props: {
        userId: {
            type: [String, Number],
            required: true
        },
    },
    data() {
        return {
            activePhase: 'phase-one',
            show: false
        }
    },
    mounted() {
        setTimeout(() => {
            this.show = true;
        }, 1000)
    },
    methods: {
        handleTransition(transition) {
            if (transition === 'complete') {
                this.show = false;
            }

            this.activePhase = transition;
        }
    }
}
</script>

<style scoped>
.animate__animated.animate__fadeIn {
    opacity: 0.9 !important;
}
</style>
