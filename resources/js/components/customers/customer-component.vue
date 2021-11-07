<template>
    <div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Customers</div>
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
                                    <a class="btn btn-primary" href="#" @click="editModal(customer)">Edit</a>
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

        <!-- Customer Modal -->
        <div id="modalFormCustomer" aria-hidden="true" aria-labelledby="addNew" class="modal fade" role="dialog"
             tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode">Create New Category</h5>
                        <h5 class="modal-title" v-show="editmode">Update Category</h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="createCustomer">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>First name</label>
                                <input type="text" v-model="form.first_name" name="first_name" id=""
                                       class="form-control"
                                       :class="{ 'is-invalid': form.errors.has('first_name') }"/>
                                <has-error field="first_name" :form="form"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" v-model="form.last_name" name="last_name" id=""
                                       class="form-control"
                                       :class="{ 'is-invalid': form.errors.has('last_name') }"/>
                                <has-error field="last_name" :form="form"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="text" v-model="form.tel" name="tel" id=""
                                       class="form-control"
                                       :class="{ 'is-invalid': form.errors.has('tel') }"/>
                                <has-error field="tel" :form="form"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" v-model="form.email" name="email" id=""
                                       class="form-control"
                                       :class="{ 'is-invalid': form.errors.has('email') }"/>
                                <has-error field="email" :form="form"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" v-model="form.address" name="address" id=""
                                       class="form-control"
                                       :class="{ 'is-invalid': form.errors.has('address') }"/>
                                <has-error field="address" :form="form"></has-error>
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
    name: "customer-component",
    data() {
        return {
            // Set editmode property to false
            editmode: false,
            customers: {},

            // Initialize customer form object
            form: new Form({
                id: "",
                first_name: "",
                last_name: "",
                tel: "",
                email: "",
                address: "",
            })
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

        //Open formModalCustomer modal for adding a new customer
        newModal() {
            this.editmode = false;
            this.form.reset();
            $('#modalFormCustomer').modal('show');
        },

        // Add a new customer
        createCustomer() {
            this.form.post('/api/customers')
                .then((response) => {
                    $('#modalFormCustomer').modal('hide');

                    Toast.fire({
                        icon: 'success',
                        title: 'Customer has been saved successfully!'
                    });

                    this.loadCustomers();
                })
                .catch(() => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Some error occured! Please try again'
                    });
                });
        },

         // Load edit modal
        editModal(customer) {
            this.editmode = true;
            this.form.reset();
            $('#modalFormCustomer').modal('show');
            this.form.fill(customer);
        },
    }
}
</script>

<style scoped>

</style>
