<template>
    <div class="mt-2 rounded overflow-hidden border w-full bg-white mx-3 md:mx-0 lg:mx-0">
        <div class="full-width-and-fixed-height-background h-72" style="background: url(https://picsum.photos/800);">
        </div>
        <div class="px-3 pb-2">
            <div class="pt-2">
                <div class="mb-2 text-gray-500 text-xlg font-bold">
                    <a :href="`/profiles/` + question.creator.username" class="mr-1 cursor-pointer">{{ question.creator.username }}</a>asks {{ question.title }}<br>
                </div>
            </div>
            <!-- This is where the last answer will go -->
            <question-card-answers :question-id="question.id"></question-card-answers>
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