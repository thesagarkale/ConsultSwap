<template>
    <div class="animate__animated animate__fadeIn">
        <div class="font-bold big text-red-400">Thank you for your time! Enjoy!</div>
        <div class="flex justify-end mt-4">
            <i class="fas fa-arrow-right text-red-400 cursor-pointer" @click="submit()"
               style="font-size: 4rem"></i>
        </div>
    </div>
</template>

<script>
export default {
    name: "PhaseThree",
    methods: {
        submit() {
            this.$emit('transition', 'complete');
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
