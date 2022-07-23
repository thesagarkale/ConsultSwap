<template>
    <div>
        <div class="rounded overflow-hidden border bg-white md:mr-4 lg:mr-4">
            <div class="full-width-and-fixed-height-background relative"
                 style="">
                <div class="absolute top-0 right-0 pt-2 pr-2">
                    <span v-for="category in question.categories"
                          class="py-1 px-3 bg-theme-salmon text-white rounded-full text-xs ml-1">
                        #{{ category.label }}
                    </span>
                </div>
            </div>
            <div class="px-3 pb-2">
                <div class="pt-2">
                    <div class="mb-2 text-gray-500 text-xlg font-bold">
                        <a :href="`/profiles/` + question.creator.username"
                           class="cursor-pointer">{{ question.creator.username }}</a> asks {{ question.title }}<br>
                    </div>
                </div>
                <div class="text-sm text-gray-500">
                    {{ question.description }}
                </div>
                <div class="pt-2">
                    <span class="text-xs text-gray-400">Created at {{ question.created_at }}</span>
                </div>
                <div class="pt-2 flex text-sm text-gray-500">
                    <div class="mr-4">
                        <i class="far fa-thumbs-up"></i> Like
                        <span class="rounded-full px-2 bg-theme-dark text-white text-xs">
                            5.5k
                        </span>
                    </div>
                    <div class="mr-4">
                        <i class="fas fa-check"></i> Answer
                        <span class="rounded-full px-2 bg-theme-dark text-white text-xs">
                            {{ question.answers.length }}
                        </span>
                    </div>
                    <div>
                        <i class="far fa-share-square"></i> Share
                        <span class="rounded-full px-2 bg-theme-dark text-white text-xs">
                            20
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 md:mr-4">
            <answer-question-textarea :question="question"></answer-question-textarea>
        </div>
        <div class="my-2 font-bold text-gray-400 text-sm border-b-2 border-gray-300 mr-4 pb-1 mb-2">Answers</div>
        <div v-for="answer in question.answers"
             class="rounded overflow-hidden border bg-white md:mr-4 lg:mr-4 mt-2 px-3 pb-2 flex justify-between items-center">
            <div>
                <div class="pt-2">
                    <div class="mb-2 text-gray-500 text-xlg font-bold">
                        {{ answer.creator.first_name }} {{ answer.creator.last_name }} answered ... <br>
                    </div>
                </div>
                <div class="text-sm text-gray-500">
                    {{ answer.answer }}
                </div>
                <div class="pt-2">
                    <span class="text-xs text-gray-400">Answered at {{ question.created_at }}</span>
                </div>
                <div class="pt-2 flex text-sm text-gray-500">
                    <div class="mr-4">
                        <i class="far fa-thumbs-up"></i> Like
                        <span class="rounded-full px-2 bg-theme-dark text-white text-xs">
                            1k
                        </span>
                    </div>
                    <div class="mr-4">
                        <i class="far fa-comment"></i> Comments
                        <span class="rounded-full px-2 bg-theme-dark text-white text-xs">
                            0
                        </span>
                    </div>
                    <div>
                        <i class="far fa-share-square"></i> Share
                        <span class="rounded-full px-2 bg-theme-dark text-white text-xs">
                            817
                        </span>
                    </div>
                </div>
            </div>
            <div>
            </div>
        </div>
    </div>
</template>

<script>
import AnswerTicks from "../AnswerTicks";
import AnswerQuestionTextarea from "../Answers/AnswerQuestionTextarea";

export default {
    name: "QuestionOverview",
    components: {AnswerQuestionTextarea, AnswerTicks},
    props: {
        question: {
            type: Object,
            required: true
        },
    },
    data() {
        return {
            input: {
                answer: null
            },
            messages: {
                error: '',
                success: '',
            }
        }
    },
}
</script>

<style scoped>

</style>