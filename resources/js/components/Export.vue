<template>
    <div>
    <button @click.prevent="exportUser">Скачать отчет</button>
    </div>
</template>

<script>
export default {
    name: "Export",

      methods: {
        exportUser() {
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    axios.get('/users/export/user')
                        .then(res => {
                            console.log(res);
                    })
                     .catch(error => {
                  console.log(error);
                  this.errored = true;
                })
                })
                
        },
    },
}
</script>

<style scoped>

</style>