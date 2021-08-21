<template>
    <div>
        <h2>{{title}}</h2>
        <v-divider/>
    </div>
</template>

<script>
    export default {
        data : ()=>({
            title : 'Loading'
        }),
        mounted(){
            let self = this
            axios.get('/api/user').then(res=>{
                self.title = 'Welcome user '+res.data.data.name
            });
        }
    }
</script>