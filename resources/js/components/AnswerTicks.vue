<template>
    <div class="flex flex-col items-center">
        <div>
            <i class="fa fa-arrow-alt-circle-up" @click="uptick()"></i>
        </div>
        <div>
            {{total}}
        </div>
        <div>
            <i class="fa fa-arrow-alt-circle-down" @click="downtick()"></i>
        </div>
    </div>
</template>

<script>
export default {
    name: "AnswerTicks",
    props: {
        answerId: {
            type: [String || Number]
        }
    },
    data() {
        return {
            total: 0
        }
    },
    mounted() {
        this.fetchTotal();
    },
    methods: {
        fetchTotal: function () {
            axios.get('/answers/' + this.answerId + '/ticks/total').then(response => {
                this.total = response.data.total;
            })
        },
        uptick: function () {
            axios.post('/ticks/up', {
                'answer_id': this.answerId
            }).then(() => {
                this.fetchTotal();
            }).catch(() => {
                console.log('Something went wrong!')
            });
        },
        downtick: function () {
            axios.post('/ticks/down', {
                'answer_id': this.answerId
            }).then(() => {
                this.fetchTotal();
            }).catch(() => {
                console.log('Something went wrong!');
            });
        }
    }
}
</script>

<style scoped>

</style>
