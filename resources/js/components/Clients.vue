<template>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone number</th>
                </tr>
            </thead>
            <tbody>
                <router-link v-for="client in clients" :key="client.id" :to="'/client/'+client.id" tag="tr">
                    <td>{{client.name}}</td>
                    <td>{{client.email}}</td>
                    <td>{{client.phone}}</td>
                </router-link>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                clients: []
            }
        },
        mounted() {
            axios.get('/api/clients')
                .then((response) => {
                    this.clients = response.data;
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
