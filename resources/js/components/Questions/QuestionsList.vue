<template>
    <div>
        <div v-if="pagination.data.length">
            <question-card v-for="question in pagination.data" :key="question.id" :question="question"></question-card>
            <div v-if="pagination.data.length" v-observe-visibility="handleEndScrolledTo"></div>
        </div>
        <tile v-if="loading" :loading="true" color="FA8186"></tile>
    </div>
</template>

<script>
import QuestionCard from "./QuestionCard";
import Tile from "../../../../node_modules/vue-spinners/src/components/TileSpinner";
export default {
    name: "QuestionsList",
    components: {QuestionCard, Tile},
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
            axios.get('/api/questions', {
                params: {
                    page: this.pagination.meta.page
                }
            }).then(response => {
                this.pagination.data.push(...response.data.data);
                this.pagination.meta = response.data.meta;
            }).then(_ => {this.loading = false;})
        },
        handleEndScrolledTo: function (isVisible) {
            if (!isVisible) { return }
            if (this.pagination.meta.page >= this.pagination.meta.pages) { return }
            this.loading = true;

            this.pagination.meta.page++;
            this.fetch();
        }
    },
}
</script>

<style scoped>

</style>