<template>
    <div>
        <div class="flex border-b border-gray-200">
            <div class="mr-4 pb-4 hover:border-b-4 hover:border-theme-salmon cursor-pointer text-gray-400 font-semibold"
                 :class="{'border-b-4 border-theme-salmon text-gray-800' : selected === 'questions'}"
                 @click="handleTabChange('questions')">
                Questions
            </div>
            <div class="pb-4 hover:border-b-4 hover:border-theme-salmon cursor-pointer text-gray-400 font-semibold"
                 :class="{'border-b-4 border-theme-salmon text-gray-800' : selected === 'answers'}"
                 @click="handleTabChange('answers')">
                Answers
            </div>
        </div>
        <div>
            <question-card v-if="!state.tabSwitch" v-for="question in questions" :question="question" v-bind:key="question.id"></question-card>
            <tile v-if="state.loading" :loading="true" color="FA8186"></tile>
        </div>
    </div>
</template>

<script>
import QuestionCard from "../../Questions/QuestionCard";
import Tile from "../../../../../node_modules/vue-spinners/src/components/TileSpinner";
export default {
    name: "UserProfileTabs",
    components: {QuestionCard, Tile},
    props: {
        userId: {
            type: [Number, String],
            required: true
        },
    },
    mounted() {
        this.fetch();
    },
    data() {
        return {
            state: {
                loading: true,
                error: false,
                tabSwitch: false
            },
            selected: 'questions',
            questions: []
        }
    },
    methods: {
        fetch: function () {
            this.state.loading = true;
            let params = {};

            if (this.selected === 'questions') {
                params.created_by = this.userId;
            } else if (this.selected === 'answers') {
                params.answered_by = this.userId;
            }

            axios.get('/api/questions', {
                params: params
            }).then(response => {
                this.questions = response.data.data;
            }).then(_ => {
                this.state.loading = false;
                this.state.tabSwitch = false;
            }).catch(() => {
                this.state.error = true;
            });
        },
        handleTabChange: function (tab) {
            this.state.loading = true;
            this.state.tabSwitch = true;
            this.selected = tab;
            this.fetch();
        }
    },
}
</script>

<style scoped>

</style>