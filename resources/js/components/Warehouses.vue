<template>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Адреса</th>
                    <th scope="col">Місткість</th>
                </tr>
            </thead>
            <tbody>
                <router-link v-for="warehouse in warehouses" :key="warehouse.id" :to="'/warehouse/'+warehouse.id" tag="tr">
                    <td>{{warehouse.address}}</td>
                    <td>{{warehouse.capacity}}</td>
                </router-link>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                warehouses: []
            }
        },
        mounted() {
            axios.get('/api/warehouses')
                .then((response) => {
                    this.warehouses = response.data;
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
