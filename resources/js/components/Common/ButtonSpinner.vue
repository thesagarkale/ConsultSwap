<template>
    <div class="button-spinner">
        <span :style="borderClass"></span>
    </div>
</template>

<script>
export default {
    name: "ButtonSpinner",
    props: {
        color: {
            type: String,
            default: '888'
        },
    },
    computed: {
        borderClass() {
            return `border-color: #${this.color} transparent transparent transparent !important;`;
        }
    },
}
</script>

<style scoped>
.button-spinner {
    line-height: 1.15;
    transition-property: padding, opacity;
    transition-duration: 0.2s, 0.2s;
    transition-timing-function: ease-in, ease;
    transition-delay: 0s, 0.2s;
    position: relative;
}
.button-spinner span {
    box-sizing: border-box;
    display: inline-block;
    left: 0;
    top: 0.15rem;
    width: 1.1rem;
    height: 1rem;
    opacity: 1;
    border: 3.4px solid #222;
    border-radius: 50%;
    animation: button-spinner 1.2s cubic-bezier(1, 0, 0.5, 1) infinite;
    border-color: #888 transparent transparent transparent
}

@keyframes button-spinner {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>