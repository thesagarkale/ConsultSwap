<template>
    <div class="animate__animated animate__fadeIn">
        <div class="font-bold big text-indigo-500">Thank you for your time!</div>
        <i class="fas fa-arrow-right text-indigo-400 cursor-pointer" @click="submit()"
               style="font-size: 4rem"></i>>
    </div>
</template>

<script>
export default {
    name: "PhaseThree",
    methods: {
        submit() {

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
