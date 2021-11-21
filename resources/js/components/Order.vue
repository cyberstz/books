<template>
    <div class="container">
        <p>Warehouse: {{order.warehouse.address}}</p>
        <p>Book: {{order.book.name}}</p>
        <p>Client: {{order.client.name}}</p>
        <p>Amount: {{order.amount}} UAH</p>
        <p>Status: {{order.status}}</p>
        <p>Date: {{order.created_at}}</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                order: []
            }
        },
        mounted() {
            axios.get('/api/order/'+ this.$route.params.id)
                .then((response) => {
                    this.order = response.data;
                });
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
