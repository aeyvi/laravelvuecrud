<template>
    <div>
        <br />
        <br />
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Customer List</h2>
                        </div>
                        <div class="card-body">
                            <br />
                            <br />
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="15%">Customer Name</th>
                                            <th width="15%">Email Address</th>
                                            <th width="10%">Mobile Number</th>
                                            <th width="20%">Address</th>
                                            <th width="10%">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in userList" :key="item.id">
                                            <td>{{ item.first_name }} {{ item.last_name }}</td>
                                            <td>{{ item.email_address }}</td>
                                            <td>{{ item.mobile_number }}</td>
                                            <td>{{ item.address }}</td>
                                            <td>{{ item.status }}</td>
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

    </div>
</template>

<script>
import { $dataMetaSchema } from 'ajv';
import axios from 'axios';

export default {
    props: ["users"],
    data() {
        return {
            userList: this.users,
        }
    },

}
</script>
