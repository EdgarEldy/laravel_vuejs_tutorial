<template>
    <div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Products</div>
                <div class="panel-body">
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary" type="button" @click="newModal">New</button>
                    <br/><br/>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product name</th>
                            <th>Unit price</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="product in products.data" :key="product.id">
                            <td>{{ product.id }}</td>
                            <td>{{ product.product_name }}</td>
                            <td>{{ product.unit_price }}</td>
                            <td>
                                <div class="card-footer">
                                    <a class="btn btn-primary" href="#">Edit</a>
                                    <a class="btn btn-danger" href="#">
                                        Remove
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="modalFormProduct" aria-hidden="true" aria-labelledby="modalFormProduct" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode">Create New Category</h5>
                        <h5 class="modal-title" v-show="editmode">Update Category</h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="Category">Select categories</label>
                                <select class="form-control" v-model="form.category_id">
                                    <option v-for="(category,id) in categories.data" :key="category.id" :value="id" :selected="id === form.category_id">
                                        {{ category.category_name }}
                                    </option>
                                </select>
                                <has-error field="category_id" :form="form"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Product name</label>
                                <input type="text" v-model="product_name" name="product_name" class="form-control" :class="{ 'is-invalid': form.errors.has('product_name') }">
                                <has-error field="product_name" :form="form"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Unit price</label>
                                <input type="text" v-model="unit_price" name="unit_price" class="form-control" :class="{ 'is-invalid': form.errors.has('unit_price') }">
                                <has-error field="unit_price" :form="form"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "product-component",

    data() {
        return {
            editmode: false,
            products: {},
            form: new Form({
                id: '',
                category_id: '',
                product_name: '',
                unit_price: ''
            }),
            categories: {}
        }
    },

    created() {
        // Products
        this.loadProducts();

        // Categories
        this.loadCategories();
    },

    // methods goes here
    methods: {
        // Load all products
        loadProducts() {
            axios.get('/api/products')
                .then(response => this.products = response.data)
                .catch(error => console.log(error));
        },

        newModal() {
            this.editmode = false;
            this.form.reset();
            $('#modalFormProduct').modal('show');
        },

        //Load categories
        loadCategories() {
            axios
                .get("http://localhost:8000/api/categories")
                .then(response => (this.categories = response.data))
                .catch(error => console.log(error));
        },

        // Create a new product
        createProduct() {
            this.form.post('/api/products')
                .then((response) => {
                    $('#modalFormProduct').modal('hide');

                    Toast.fire({
                        icon: 'success',
                        title: 'Product has been saved successfully!'
                    });

                    this.loadProducts();
                })
                .catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Some error occured! Please try again'
                    });
                });
        },
    }
}
</script>

<style scoped>

</style>
