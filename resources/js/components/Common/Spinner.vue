<template>
    <div class="u-CircleLoader--overlay" v-if="show">
        <div class="u-CircleLoader" :class="{'u-CircleLoader--load-complete' : complete}">
            <div class="c-Checkmark draw" style="display: none" :class="{'display-block' : complete}"></div>
        </div>
        <span v-if="complete" style="margin-top: 1rem">Done</span>
    </div>
</template>
<script>
export default {
    name: "Spinner",
    props: {
        show: Boolean,
        complete: Boolean
    }
}
</script>

<style scoped>
.display-block {
    display: block !important;
}
</style>