<template>
    <div>
        <br />
        <br />
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Order List</h2>
                        </div>
                        <div class="card-body">
                            <br />
                            <br />
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="40%">OrderID</th>
                                            <th width="45%">Product Name</th>
                                            <th width="40%">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in orderList" :key="item.id">
                                            <td>{{ item.id }}</td>
                                            <td>{{ item.product_name }}</td>
                                            <td>{{ item.price }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <br />
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Order Summary</h2>
                        </div>
                        <div class="card-body">
                            <br />
                            <br />
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="45%">Product Name</th>
                                            <th width="40%">Total Quantity</th>
                                            <th width="40%">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in orderSummary" :key="item.id">
                                            <td>{{ item.product_name }}</td>
                                            <td>{{ item.quantity }}</td>
                                            <td>{{ item.price }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <br />
    </div>
</template>

<script>
import { $dataMetaSchema } from 'ajv';
import axios from 'axios';

export default {
    props: ["order", "ordersummary"],
    data() {
        return {
            orderList: this.order,
            orderSummary: this.ordersummary,
        }
    },

}
</script>
