<template>
    <div>
        <div>
            <div class="w-100">
                <div v-for="category in categories">
                    {{ category.label }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Induction",
    data() {
        return {
            categories: []
        }
    },
    mounted() {
        this.fetchCategories();
    },
    methods: {
        fetchCategories: function () {
            axios.get('/api/categories').then(response => {
                console.log(response.data);
                this.categories = response.data;
            })
        }
    }
}
</script>

<style scoped>

</style>
