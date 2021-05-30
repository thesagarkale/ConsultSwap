<template>
    <div class="logo" :style="cssVars">
        Consultpeer.
    </div>
</template>

<script>
export default {
    name: "ApplicationLogo",
    props: {
        fontSize: {
            type: [Number, String],
            default: 1
        },
        color: {
            type: String,
            default: 'FFFFFF'
        }
    },
    computed: {
        cssVars() {
            return {
                'font-size': this.fontSize + 'rem',
                'color': '#' + this.color
            };
        }
    },
}
</script>

<style scoped>
.logo {
    font-family: 'Suez One', serif;
}
</style>
