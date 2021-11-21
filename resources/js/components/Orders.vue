<template>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Warehouse</th>
                    <th scope="col">Book</th>
                    <th scope="col">Client</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <router-link v-for="order in orders" :key="order.id" :to="'/order/'+order.id" tag="tr">
                    <td>{{order.warehouse.address}}</td>
                    <td>{{order.book.name}}</td>
                    <td>{{order.client.name}}</td>
                    <td>{{order.amount}}</td>
                    <td>{{order.status}}</td>
                    <td>{{order.created_at}}</td>
                </router-link>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                orders: []
            }
        },
        mounted() {
            axios.get('/api/orders')
                .then((response) => {
                    this.orders = response.data;
                })
        }
    }
</script>

<style scoped>
    tbody tr {
        cursor: pointer;
    }
    tbody tr:hover {
        filter: brightness(85%);
    }
</style>
