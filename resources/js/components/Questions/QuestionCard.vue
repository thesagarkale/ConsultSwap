<template>
    <div class="mt-2 rounded overflow-hidden border w-full bg-white mx-3 md:mx-0 lg:mx-0">
        <div class="full-width-and-fixed-height-background h-72" style="background: url(https://picsum.photos/800);">

        </div>
        <div class="px-3 pb-2">
            <div class="pt-2">
                <div class="mb-2 text-gray-500 text-xlg font-bold">
                    <span class="mr-1">{{ question.creator.username }}</span>asks {{ question.title }}<br>
                </div>
            </div>
            <!-- This is where the last answer will go -->
            <div class="text-sm mb-2 text-gray-400 cursor-pointer font-medium">View all 14 answers</div>
            <div class="mb-2">
                <div class="mb-2 text-sm">
                    <span class="font-medium mr-1">test_user</span>answered
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import UserLabel from "../Users/UserLabel";

export default {
    name: "QuestionCard",
    components: {UserLabel},
    props: {
        question: {
            type: Object,
            required: true
        },
    },
}
</script>

<style scoped>

</style>