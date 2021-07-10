<template>
    <div>
        <div class="cursor-pointer" @click="show = true">
            <div class="p-6 bg-white rounded overflow-hidden shadow-sm sm:rounded-lg">
                <user-label :user-id="userId"></user-label>
                <div class="border-b-2 border-gray-200 text-gray-500 text-xlg font-bold pb-4 mt-4 cursor-pointer">Ask a
                    question?
                </div>
            </div>
        </div>
        <create-question-modal :show="show" @close:modal="handle()"></create-question-modal>
    </div>
</template>

<script>
import UserLabel from "../Users/UserLabel";
import CreateQuestionModal from "./CreateQuestionModal";

export default {
    name: "AskAQuestion",
    components: {CreateQuestionModal, UserLabel},
    props: {
        userId: [String, Number]
    },
    data() {
        return {
            show: false
        }
    },
    methods: {
        handle() {
            this.show = false;
        }
    },
}
</script>

<style scoped>

</style>