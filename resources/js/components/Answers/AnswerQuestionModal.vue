<template>
    <div class="modal" v-if="show">
        <div class="modal-container">
            <spinner :show="spinner.show" :complete="spinner.complete"></spinner>
            <div class="modal-header">
                <div class="flex justify-between w-full">
                    <div v-on:click="resetAndClose"><i class="fa fa-times text-sm"></i></div>
                    <div class="text-sm text-gray-500 font-bold">Answer the question</div>
                    <div></div>
                </div>
            </div>
            <div class="modal-body">
                <div class="pt-4">
                    <div class="text-gray-500 text-lg font-bold">
                        {{question.title}}
                    </div>
                    <div class="pt-2 text-gray-500">
                        {{question.description}}
                    </div>
                </div>

                <div class="flex flex-col">
                    <label for="answer" class="text-sm pb-1 pt-4 text-gray-400 font-bold">Answer</label>
                    <textarea id="answer"
                              v-model="input.answer"
                              class="h-40 shadow-sm border-t-0 border-l-0 border-r-0 border-b-2 border-gray-300 text-gray-600 focus:border-theme-salmon focus:ring-0"
                              type="text" placeholder="Write you answer here ..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <div class="w-full flex justify-end">
                    <button class="px-3 py-1 bg-theme-salmon rounded-full text-white font-light text-sm"
                            @click="submit">Answer
                    </button>
                </div>
            </div>
        </div>
        <div class="modal-overlay" @click="$emit('close:modal')"></div>
    </div>
</template>

<script>
import Spinner from "../Common/Spinner";
export default {
    name: "AnswersQuestionModal",
    components: {Spinner},
    props: {
        question: {
            type: Object,
            required: true
        },
        show: {
            type: Boolean,
            required: true
        },
    },
    data() {
        return {
            input: {
                answer: null
            },
            spinner: {
                show: false,
                complete: false
            }
        }
    },
    methods: {
        submit: function () {
            this.spinner.show = true;
            axios.post('/api/questions/' + this.question.id + '/answers', {
                'answer': this.input.answer,
            }).then(() => {
                this.spinner.complete = true;
                this.success = true;
            }).then(() => {
                setTimeout(() => {
                    this.$emit('close:modal');
                    this.$emit('question:answered');
                }, 1000);
            }).catch(() => {
                this.spinner.show = false;
                this.error = true;
            });
        },
        resetAndClose: function () {
            this.input = {
                answer: null,
            };
            this.spinner = {
                show: false,
                complete: false
            };
            this.error = false;
            this.$emit('close:modal');
        }
    },
}
</script>

<style scoped>

</style>