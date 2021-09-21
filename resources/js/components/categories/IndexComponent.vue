<template>
    <div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Product categories</div>
                <div class="panel-body">
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary" type="button" @click="newModal">New</button>
                    <br/><br/>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category name</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="category in categories.data" :key="category.id">
                            <td>{{ category.id }}</td>
                            <td>{{ category.category_name }}</td>
                            <td>
                                <div class="card-footer">
                                    <a class="btn btn-primary" href="">Edit</a>
                                    <form action="#" method="POST">
                                        <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this category ?')"
                                                type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <pagination :data="categories" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="modalFormCategory" aria-hidden="true" aria-labelledby="addNew" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode">Create New Category</h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Category name</label>
                                <input type="text" name="category_name" id="" class="form-control"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "IndexComponent",

    data() {
        return {
            // Set editmode property to false
            editmode: false,
            categories: {},
            form: new Form({
                id: "",
                category_name: ""
            })
        };
    },

    created() {
        // Call getCategories method and mount
        this.getCategories();
    },

    // methods goes here
    methods: {
        // Retrieve product categories from backend
        getCategories() {
            axios
                .get("http://localhost:8000/api/categories")
                .then(response => (this.categories = response.data))
                .catch(error => console.log(error));
        },

        // Load categories with pagination
        getResults(page = 1) {
            axios
                .get("/api/categories?page=" + page)
                .then(({data}) => (this.categories = data.data));
        },

        //Load formModalCategory modal if we want to add a new category
        newModal() {
            this.editmode = false;
            this.form.reset();
            $('#modalFormCategory').modal('show');
        }
    }
};
</script>

<style scoped></style>
