<template>
    <div>
        <pulse v-if="loading" :loading="true"></pulse>
        <div v-if="!loading">
            <a :href="`/questions/`+ question.id" v-if="totalAnswers !== 0" class="text-sm my-2 text-gray-400 cursor-pointer font-medium">View all {{totalAnswers}} answers</a>
            <div class="mb-2">
                <div class="mb-2 text-sm" v-if="lastAnswer">
                    <span class="font-medium mr-1">{{lastAnswer.creator.username}}</span>answered
                    {{lastAnswer.answer}}
                </div>
                <div class="mb-2 text-gray-400 text-sm cursor-pointer" v-if="!lastAnswer">
                    <span @click="showAnswerModal = true" class="italic">No answers yet. Be the first one to answer!</span>
                    <answers-question-modal @question:answered="fetchAnswers" :show="showAnswerModal" :question="question" @close:modal="showAnswerModal = false"></answers-question-modal>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Pulse from "../../../../node_modules/vue-spinners/src/components/PulseSpinner"
import AnswersQuestionModal from "../Answers/AnswerQuestionModal";
export default {
    name: "QuestionCardAnswers",
    components: {AnswersQuestionModal, Pulse},
    props: {
        question: {
            type: Object,
            required: true
        },
    },
    data() {
        return {
            totalAnswers: null,
            answers: null,
            loading: true,
            showAnswerModal: false,
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
            this.loading = true;
            axios.get('/api/questions/' + this.question.id + '/answers').then(response => {
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