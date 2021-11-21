<template>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Назва</th>
                    <th scope="col">Автор</th>
                </tr>
            </thead>
            <tbody>
                <router-link v-for="book in books" :key="book.id" :to="'/book/'+book.id" tag="tr">
                    <td>{{book.name}}</td>
                    <td>{{book.author.name}}</td>
                </router-link>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                books: []
            }
        },
        mounted() {
            axios.get('/api/books')
                .then((response) => {
                    this.books = response.data;
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
