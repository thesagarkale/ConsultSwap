<template>
    <div>
        <pulse v-if="loading" :loading="true"></pulse>
        <div v-if="!loading">
            <div v-if="totalAnswers !== 0" class="text-sm mb-2 text-gray-400 cursor-pointer font-medium">View all {{totalAnswers}} answers</div>
            <div class="mb-2">
                <div class="mb-2 text-sm" v-if="lastAnswer">
                    <span class="font-medium mr-1">{{lastAnswer.creator.username}}</span>answered
                    {{lastAnswer.answer}}
                </div>
                <div class="mb-2 text-gray-400 text-sm italic cursor-pointer" v-if="!lastAnswer">
                    No answers yet. Be the first one to answer!
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Pulse from "../../../../node_modules/vue-spinners/src/components/PulseSpinner"
export default {
    name: "QuestionCardAnswers",
    components: {Pulse},
    props: {
        questionId: {
            type: Number,
            required: true
        },
    },
    data() {
        return {
            totalAnswers: null,
            answers: null,
            loading: true,
        }
    },
    created() {
        this.fetchAnswers();
    },
    computed: {
        lastAnswer() {
            if (!this.answers.length) {
                return null;
            }

            return this.answers[this.answers.length - 1];
        }
    },
    methods: {
        fetchAnswers: function () {
            axios.get('/api/questions/' + this.questionId + '/answers').then(response => {
                this.answers = response.data.data;
                this.totalAnswers = response.data.meta.total;
            }).then(() => {
                this.loading = false;
            });
        }
    },
}
</script>

<style scoped>

</style>