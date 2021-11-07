<template>
    <div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Customers</div>
                <div class="panel-body">
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary" type="button">New</button>
                    <br/><br/>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="customer in customers.data" :key="customer.id">
                            <td>{{ customer.id }}</td>
                            <td>{{ customer.first_name }}</td>
                            <td>{{ customer.last_name }}</td>
                            <td>{{ customer.tel }}</td>
                            <td>{{ customer.email }}</td>
                            <td>{{ customer.address }}</td>
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
    name: "customer-component",
    data() {
        return {
            customers: {}
        }
    },

    created() {
        // Call loadCustomers method and mount
        this.loadCustomers();
    },

    // Methods goes here..
    methods: {

        // Retrieve customers from the backend
        loadCustomers() {
            axios
                .get("/api/customers")
                .then(response => (this.customers = response.data))
                .catch(error => console.log(error));
        },
    }
}
</script>

<style scoped>

</style>
