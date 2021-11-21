<template>
    <div class="container">
        <p>Name: {{book.name}}</p>
        <p>Author: {{book.author.name}}</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                book: []
            }
        },
        mounted() {
            axios.get('/api/book/'+ this.$route.params.id)
                .then((response) => {
                    this.book = response.data;
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
