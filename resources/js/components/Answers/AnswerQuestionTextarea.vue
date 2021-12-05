<template>
    <div>
        <textarea
            rows="4"
            cols="50"
            placeholder="Please write you answer here."
            class="w-full rounded focus:border-theme-salmon border-gray-300"
            v-model="data.answer">
        </textarea>
        <div class="flex justify-end">
            <button type="button"
                    @click="submitAnswer"
                    :disabled="disableSubmit"
                    class="rounded-full text-white py-1 px-2 text-sm font-bold"
                    :class="bgColorClass"
            >
                Submit
            </button>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "AnswerQuestionTextarea",
    props: {
        question: {
            type: Object,
            required: true
        },
    },
    computed: {
        bgColorClass() {
            return this.disableSubmit ? 'bg-gray-500' : 'bg-theme-salmon';
        }
    },
    data() {
        return {
            disableSubmit: false,
            data: {
                answer: null
            }
        }
    },
    methods: {
        submitAnswer: function () {
            this.disableSubmit = true;
            if (this.data.answer === null || this.data.answer === '') {
                this.disableSubmit = false;
                return;
            }

            axios.post('/api/questions/' + this.question.id + '/answers', {
                'answer': this.data.answer
            }).then(() => {
                window.location.replace('/questions/' + this.question.id);
            });
        }
    },
}
</script>

<style scoped>

</style>