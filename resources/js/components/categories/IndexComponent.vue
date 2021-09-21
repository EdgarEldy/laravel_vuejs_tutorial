<template>
    <div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Product categories</div>
                <div class="panel-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary">
                        New
                    </button>
                    <br><br>
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
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <form action="#" method="POST">
                                        <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this category ?')"
                                                class="btn btn-danger btn-sm">Delete
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
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
                id: '',
                category_name: ''
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
            axios.get('http://localhost:8000/api/categories')
                .then(response => (this.categories = response.data))
                .catch(error => console.log(error));
        },
        
        // Load categories with pagination
        getResults(page = 1) {
            axios.get('/api/categories?page=' + page).then(({data}) => (this.categories = data.data))
        }
    },
}
</script>

<style scoped>

</style>
