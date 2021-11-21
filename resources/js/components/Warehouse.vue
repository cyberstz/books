<template>
    <div class="container">
        <p>{{warehouse.address}}</p>
        <p v-for="book in books" :key="book.id">
            <span>Book: {{book.name}}</span><br>
            <span>Author: {{book.author.name}}</span>
        </p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                warehouse: [],
                books: []
            }
        },
        mounted() {
            axios.get('/api/warehouse/'+ this.$route.params.id)
                .then((response) => {
                    this.warehouse = response.data;
                });

            axios.get('/api/warehouse/'+ this.$route.params.id +'/books')
                .then((response) => {
                    this.books = response.data;
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
