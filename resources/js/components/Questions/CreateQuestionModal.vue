<template>
    <div class="modal" v-if="show">
        <div class="modal-container">
            <spinner :show="spinner.show" :complete="spinner.complete"></spinner>
            <div class="modal-header">
                <div class="flex justify-between w-full">
                    <div v-on:click="resetAndClose"><i class="fa fa-times text-sm"></i></div>
                    <div class="text-sm">Ask a question</div>
                    <div></div>
                </div>
            </div>
            <div class="modal-body">
                <div class="flex flex-col">
                    <label for="title" class="text-sm pb-1 pt-4 text-gray-400 font-bold">Title</label>
                    <input id="title"
                           v-model="input.title"
                           class="input-default"
                           type="text" placeholder="Type your title ...">
                </div>
                <div class="flex flex-col">
                    <label for="description" class="text-sm pb-1 pt-4 text-gray-400 font-bold">Description</label>
                    <textarea id="description"
                              v-model="input.description"
                              class="h-40 input-default"
                              type="text" placeholder="Give a brief description ..."></textarea>
                </div>
                <div class="flex flex-col">
                    <label for="category" class="text-sm pb-1 pt-4 text-gray-400 font-bold">Category</label>
                    <select id="category"
                            v-model="input.category"
                            class="input-default">
                        <option value="" class="text-gray-400">Please select</option>
                        <option v-for="category in categories" :value="category.id">{{ category.label }}</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <div class="w-full flex justify-end">
                    <button class="px-3 py-1 bg-theme-salmon rounded-full text-white font-light text-sm"
                            @click="submit">Create
                    </button>
                </div>
            </div>
        </div>
        <div class="modal-overlay" v-on:click="resetAndClose"></div>
    </div>
</template>

<script>
import Spinner from "../Common/Spinner";

export default {
    name: "CreateQuestionModal",
    components: {Spinner},
    props: {
        show: {
            type: Boolean,
            default: false
        },
    },
    data() {
        return {
            categories: null,
            error: false,
            input: {
                title: '',
                description: '',
                category: ''
            },
            spinner: {
                show: false,
                complete: false
            }
        }
    },
    mounted() {
        this.fetchCategories();
    },
    methods: {
        resetAndClose: function () {
            this.input = {
                title: '',
                description: '',
                category: ''
            };
            this.spinner = {
                show: false,
                complete: false
            };
            this.error = false;
            this.$emit('close:modal');
        },
        fetchCategories: function () {
            axios.get('/api/categories').then(response => {
                this.categories = response.data;
            })
        },
        submit: function () {
            this.spinner.show = true;
            axios.post('/api/questions', {
                'title': this.input.title,
                'description': this.input.description,
                'category': this.input.category
            }).then(() => {
                this.spinner.complete = true;
                this.success = true;
            }).then(() => {
                setTimeout(() => {
                    this.$emit('close:modal');
                    this.$emit('question:created');
                }, 1000);
            }).catch(() => {
                this.spinner.show = false;
                this.error = true;
            });
        }
    },
}
</script>

<style scoped>

</style>