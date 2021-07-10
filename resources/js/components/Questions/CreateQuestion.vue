<template>
    <div>
        <button class="bg-theme-blue text-white px-4 py-1 rounded-full text-sm font-bold focus:no-underline"
                @click="show = true">Ask a question
        </button>
        <create-question-modal :show="show" @close:modal="show = false"></create-question-modal>
    </div>
</template>

<script>
import CreateQuestionModal from "./CreateQuestionModal";
export default {
    name: "CreateQuestion",
    components: {CreateQuestionModal},
    data() {
        return {
            show: false,
            categories: null
        }
    }
}
</script>

<style scoped>

</style>