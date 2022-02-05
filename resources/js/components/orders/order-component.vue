<template>
    <div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Orders</div>
                <div class="panel-body">
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary" type="button" @click="newModal">New</button>
                    <br/><br/>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Product name</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="order in orders.data" :key="order.id">
                            <td>{{ order.id }}</td>
                            <td>{{ order.customer.first_name }}</td>
                            <td>{{ order.customer.last_name }}</td>
                            <td>{{ order.product.product_name }}</td>
                            <td>{{ order.product.unit_price }}</td>
                            <td>{{ order.qty }}</td>
                            <td>{{ order.total }}</td>
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

        <!-- Order Form Modal -->
        <div id="modalFormOrder" aria-hidden="true" aria-labelledby="modalFormOrder" class="modal fade"
             role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode">Create New Order</h5>
                        <h5 class="modal-title" v-show="editmode">Update Order</h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
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
        <!-- End Of Order Form Modal -->
    </div>

</template>

<script>
export default {
    name: "order-component",

    data() {
        return {
            editmode: false,
            orders: {},
            form: new Form({
                id: '',
                customer_id: '',
                product_id: '',
                qty: '',
                total: '',
            }),
            customers: {},
            products: {}
        }
    },

    created() {
        // Call loadOrders method and mount
        this.loadOrders();
    },

    // methods goes here
    methods: {
        // Load all orders
        loadOrders() {
            axios.get('/api/orders')
                .then(({data}) => (this.orders = data.data))
                .catch(error => console.log(error));
        },

        // Open order modal
        newModal() {
            this.editmode = false;
            this.form.reset();
            $('#modalFormOrder').modal('show');
        },

        //Load customers
        loadCustomers() {
            axios
                .get('/api/customers/list')
                .then(({data}) => (this.customers = data.data))
                .catch(error => console.log(error));
        },
    },
}
</script>

<style scoped>

</style>
