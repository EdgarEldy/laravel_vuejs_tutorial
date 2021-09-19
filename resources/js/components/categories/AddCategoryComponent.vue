<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddCategory">
            New
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalAddCategory" data-backdrop="static" tabindex="-1" role="dialog"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Product category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label for="category name">Category name </label>
                                <input type="text" id="category_name" name="category_name" v-model="category_name"
                                       class="form-control" value=""/>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" @click="storeCategory" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CategoryAddComponent",

    data() {
        return {
            category_name: ''
        }
    },

    // Methods goes here..
    methods: {
        storeCategory() {
            axios.post('http://localhost:8000/api/categories', {
                category_name: this.category_name
            })
                .then(response => console.log(response))
                .catch(error => console.log(error));
        },
    }
}
</script>

<style scoped>

</style>
