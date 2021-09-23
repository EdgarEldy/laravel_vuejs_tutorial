<template>
    <div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Products</div>
                <div class="panel-body">
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary" type="button">New</button>
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
    </div>
</template>

<script>
export default {
    name: "product-component",

    data() {
        return {
            products: {}
        }
    },

    created() {
        this.loadProducts();
    },

    // methods goes here
    methods: {
        // Load all products
        loadProducts() {
            axios.get('/api/products')
                .then(response => this.products = response.data)
                .catch(error => console.log(error));
        }
    }
}
</script>

<style scoped>

</style>
