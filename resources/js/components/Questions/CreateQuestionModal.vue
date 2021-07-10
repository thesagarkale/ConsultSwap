<template>
    <div class="modal" v-if="show">
        <div class="modal-container">
            <div class="modal-header">
                <div class="flex justify-between w-full">
                    <div v-on:click="$emit('close:modal')"><i class="fa fa-times text-sm"></i></div>
                    <div class="text-sm">Ask a question</div>
                    <div></div>
                </div>
            </div>
            <div class="modal-body">
                <div class="flex flex-col">
                    <label for="title" class="text-sm pb-1 pt-4 text-gray-400 font-bold">Title</label>
                    <input id="title"
                           class="shadow-sm border-t-0 border-l-0 border-r-0 border-b-2 border-gray-300 focus:border-theme-salmon focus:ring-0"
                           type="text" placeholder="Type your title ...">
                </div>
                <div class="flex flex-col">
                    <label for="description" class="text-sm pb-1 pt-4 text-gray-400 font-bold">Description</label>
                    <textarea id="description"
                              class="h-40 shadow-sm border-t-0 border-l-0 border-r-0 border-b-2 border-gray-300 focus:border-theme-salmon focus:ring-0"
                              type="text" placeholder="Give a brief description ..."></textarea>
                </div>
                <div class="flex flex-col">
                    <label for="category" class="text-sm pb-1 pt-4 text-gray-400 font-bold">Category</label>
                    <select id="category"
                            class="shadow-sm border-t-0 border-l-0 border-r-0 border-b-2 border-gray-300 focus:border-theme-salmon focus:ring-0">
                        <option value="" class="text-gray-400">Please select</option>
                        <option v-for="category in categories" :value="category.id">{{category.label}}</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <div class="w-full flex justify-end">
                    <button class="px-3 py-1 bg-theme-salmon rounded-full text-white font-light text-sm" @click="submit">Create</button>
                </div>
            </div>
        </div>
        <div class="modal-overlay" v-on:click="$emit('close:modal')"></div>
    </div>
</template>

<script>
export default {
    name: "CreateQuestionModal",
    props: {
        show: {
            type: Boolean,
            default: false
        },
    },
    data() {
        return {
            categories: null,
            success: false,
            error: false
        }
    },
    mounted() {
        this.fetchCategories();
    },
    methods: {
        fetchCategories: function () {
            axios.get('/api/categories').then(response => {
                this.categories = response.data;
            })
        },
        submit: function () {
            axios.post('/api/questions').then(() => {
                this.success = true;
            }).catch(() => {
                this.error = true;
            });
        }
    },
}
</script>

<style scoped>

</style>