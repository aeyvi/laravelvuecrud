<template>
    <div>
        <br />
        <br />
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Products List</h2>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-success btn-sm float-right" @click="addopen()">Add Product</button>
                            <br />
                            <br />
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="25%">Product Name</th>
                                            <th width="50%">Product Description</th>
                                            <th width="10%">Price</th>
                                            <th width="20%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in productList" :key="item.id">
                                            <td>{{ item.product_name }}</td>
                                            <td>{{ item.product_description }}</td>
                                            <td>{{ item.price }}</td>
                                            <td>
                                                <!-- <button class="btn btn-info btn-sm">View</button> -->
                                                <button class="btn btn-primary btn-sm" @click="edit(item)">Edit</button>
                                                <button class="btn btn-danger btn-sm"
                                                    @click="remove(item, index)">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>

                                <!-- Add Modal -->
                                <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Add Product Info
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close" @click="close()">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>
                                                        <b>Product Name</b>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Input Product Name" v-model="form.product_name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        <b>Product Description</b>
                                                    </label>
                                                    <textarea class="form-control"
                                                        placeholder="Input Product Description"
                                                        v-model="form.product_description" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        <b>Product Quantity</b>
                                                    </label>
                                                    <input type="number" class="form-control"
                                                        placeholder="Input Quantity" v-model="form.quantity" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        <b>Product Price</b>
                                                    </label>
                                                    <input type="number" class="form-control" placeholder="Input Price"
                                                        v-model="form.price" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        <b>
                                                            Product Status
                                                        </b>
                                                    </label>
                                                    <select class="form-control" v-model="form.status" required>
                                                        <option value="Enable">Enable</option>
                                                        <option value="Disable">Disable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                    @click="close()">Close</button>
                                                <button type="button" class="btn btn-primary" @click="submit()">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Update Modal -->
                                <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Product Info
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close" @click="close()">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>
                                                        <b>Product Name</b>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Input Product Name"
                                                        v-model="formEdit.product_name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        <b>Product Description</b>
                                                    </label>
                                                    <textarea class="form-control"
                                                        placeholder="Input Product Description"
                                                        v-model="formEdit.product_description" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        <b>Product Quantity</b>
                                                    </label>
                                                    <input type="number" class="form-control"
                                                        placeholder="Input Quantity" v-model="formEdit.quantity" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        <b>Product Price</b>
                                                    </label>
                                                    <input type="number" class="form-control" placeholder="Input Price"
                                                        v-model="formEdit.price" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        <b>
                                                            Product Status
                                                        </b>
                                                    </label>
                                                    <select class="form-control" v-model="formEdit.status" required>
                                                        <option value="Enable">Enable</option>
                                                        <option value="Disable">Disable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                    @click="close()">Close</button>
                                                <button type="button" class="btn btn-primary" @click="save()">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { $dataMetaSchema } from 'ajv';
import axios from 'axios';

export default {
    props: ["product"],
    data() {
        return {
            productList: this.product,
            form: {
                product_name: null,
                product_description: null,
                quantity: 0,
                price: 0,
                status: "Active",
            },
            formEdit: {
                product_name: null,
                product_description: null,
                quantity: 0,
                price: 0,
                status: "Active",
            },
            selectedId: null,

        }
    },
    methods: {
        submit() {
            const list = this;
            axios.post("/product", this.form)
                .then(function (response) {
                    list.productList.push(response.data.data)
                    list.form.product_name = null
                    list.form.product_description = null
                    list.form.quantity = 0
                    list.form.price = 0
                    list.form.status = "Active"
                    alert(response.data.message)
                    location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                    alert("An error has occured. Please try again.")
                });
        },
        remove(item, index) {
            const list = this;
            axios.delete(`/product/${item.id}`)
                .then(function (response) {
                    list.productList.splice(index, 1);
                    alert(response.data.message)
                })
                .catch(function (error) {
                    console.log(error);
                    alert("An error has occured. Please try again.")
                });
        },
        edit(item) {
            const list = this;
            console.log(list);
            $("#editModal").modal("show");

            list.formEdit.product_name = item.product_name
            list.formEdit.product_description = item.product_description
            list.formEdit.quantity = item.quantity
            list.formEdit.price = item.price
            list.formEdit.status = item.status
            list.selectedId = item.id

        },
        save() {
            const list = this;
            axios.put(`/product/${list.selectedId}`, list.formEdit)
                .then(function (response) {
                    alert(response.data.message)
                    location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                    alert("An error has occured. Please try again.")
                });
        },
        addopen() {
            $("#addModal").modal("show");
        },
        close() {
            $(".modal").modal("hide");
        }
    }
}
</script>
