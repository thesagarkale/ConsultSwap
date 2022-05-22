<template>
    <div>
        <ask-a-question class="w-full" :user-id="userId" @question:created="handleQuestionCreated"></ask-a-question>
        <div v-if="pagination.data.length">
            <question-card v-for="question in pagination.data" :key="'question_'+question.id" :question="question"></question-card>
            <div v-if="pagination.data.length" v-observe-visibility="handleEndScrolledTo"></div>
        </div>
        <tile v-if="loading" :loading="true" color="FA8186"></tile>
    </div>
</template>

<script>
import QuestionCard from "./QuestionCard";
import Tile from "../../../../node_modules/vue-spinners/src/components/TileSpinner";
import AskAQuestion from "./AskAQuestion";
export default {
    name: "QuestionsList",
    components: {AskAQuestion, QuestionCard, Tile},
    props: {
        userId: {
            type: Number,
            required: true
        },
    },
    data() {
        return {
            pagination: {
                data: [],
                meta: {
                    page: 1,
                    pages: 1
                }
            },
            loading: true
        }
    },
    created() {
        this.loading = true;
        this.fetch();
    },
    methods: {
        fetch: function () {
            this.loading = true;
            axios.get('/api/questions', {
                params: {
                    page: this.pagination.meta.page
                }
            }).then(response => {
                this.pagination.data.push(...response.data.data);
                this.pagination.meta = response.data.meta;
            }).then(() => {this.loading = false;})
        },
        handleEndScrolledTo: function (isVisible) {
            if (!isVisible) { return }
            if (this.pagination.meta.page >= this.pagination.meta.pages) { return }
            this.loading = true;

            this.pagination.meta.page++;
            this.fetch();
        },
        handleQuestionCreated: function () {
            this.pagination = {
                data: [],
                    meta: {
                    page: 1,
                        pages: 1
                }
            };

            this.fetch();
        }
    },
}
</script>

<style scoped>

</style>