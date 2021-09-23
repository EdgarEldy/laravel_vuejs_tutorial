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
                        <th>Category name</th>
                        <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
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
    name: "product-component"
}
</script>

<style scoped>

</style>
