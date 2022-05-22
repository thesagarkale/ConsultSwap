<template>
    <div class="mt-2 rounded overflow-hidden border w-full bg-white">
<!--        <div class="full-width-and-fixed-height-background h-72 relative"
             style="background: url(https://picsum.photos/800);">
        </div>-->
        <div class="px-3 pb-2">
            <div class="pt-2">
                <div class="mb-2 text-gray-500 font-bold">
                    <a :href="`/profiles/` + question.creator.username"
                       class="cursor-pointer">{{ question.creator.username }}</a> asks <a
                    :href="`/questions/` + question.id" class="cursor-pointer">{{ question.title }}</a><br>
                </div>
            </div>

            <!-- This is where the last answer will go -->
            <question-card-answers :question="question" class="pb-2 border-b border-gray-200"></question-card-answers>

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
</template>

<script>
import UserLabel from "../Users/UserLabel";
import QuestionCardAnswers from "./QuestionCardAnswers";

export default {
    name: "QuestionCard",
    components: {QuestionCardAnswers, UserLabel},
    props: {
        question: {
            type: Object,
            required: true
        },
    }
}
</script>

<style scoped>

</style>