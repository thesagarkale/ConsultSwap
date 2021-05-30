<template>
    <div class="animate__animated animate__fadeIn">
        <div class="c-Induction_header font-bold text-white z-10 text-red-400" style="padding-top: 6rem">
            Before we get started ...
        </div>
        <div class="c-Induction_categories">
            <div class="text-white pt-8 font-extralight c-Induction_categories_text">
                Which of these categories would you be interested in?
            </div>
            <div class="pt-8 flex flex-wrap">
                <div v-for="category in categories" style="font-size: 2rem" @click="updateSelected(category.id)"
                     class="capitalize mt-4 mr-4 pl-5
                                pr-5 pt-2 pb-2 border rounded-full break-words border-white text-white hover:bg-red-400
                                hover:border-red-400 cursor-pointer font-extralight"
                     :class="{'bg-red-400 border-red-400': selected.indexOf(category.id) !== -1}">
                    {{ category.label }}
                </div>
            </div>
        </div>
        <div class="flex justify-between content-center pt-8">
            <span class="text-white text-lg font-extralight italic">Selected items: {{ selected.length }}</span>
            <span class="text-white text-lg font-extralight italic text-red-500" v-if="this.errorMessage.show">{{
                    this.errorMessage.message
                }}</span>
            <i class="fas fa-arrow-right text-red-400 cursor-pointer" @click="submit()"
               style="font-size: 4rem"></i>
        </div>
    </div>
</template>

<script>
export default {
    name: "PhaseTwo",
    props: {
        userId: {
            type: [String, Number],
            required: true
        },
    },
    created() {
        this.fetchCategories();
    },
    data() {
        return {
            categories: [],
            selected: [],
            errorMessage: {
                'show': false,
                'message': 'Something went bad! Please try again!'
            }
        }
    },
    methods: {
        fetchCategories: function () {
            axios.get('/api/categories').then(response => {
                this.categories = response.data;
            })
        },
        updateSelected: function (item) {
            if (this.selected.indexOf(item) === -1) {
                this.selected.push(item);
            } else {
                this.selected.splice(this.selected.indexOf(item), 1);
            }
        },
        submit: function () {
            if (this.selected.length === 0) {
                this.errorMessage.message = 'Please select at least 1 to continue';
                this.errorMessage.show = true;
                return;
            }

            axios.post('/api/users/' + this.userId + '/categories', {
                keys: this.selected
            }).then(() => {
                this.$emit('transition', 'phase-three');
            }).catch(() => {
                this.errorMessage.message = 'Something went wrong! Please try again.';
                this.errorMessage.show = true;
            });
        },
    },
}
</script>

<style scoped>

</style>
