<template>
    <v-app>
        <router-view/>
        <custom-snackbar/>
    </v-app>
</template>

<script>
    import { mapState, mapMutations, mapActions } from 'vuex'
    import CustomSnackbar from './Common/CustomSnackbar.vue'

    export default {
        components : {
            CustomSnackbar
        },
        computed : {
            ...mapState({
                token : state=>state.global.auth.token
            })
        },
        created(){
            if(localStorage.token && localStorage.token != 'null'){
                this.mutateToken(localStorage.token)
            }
        },
        methods : {
            ...mapActions(['validateToken']),
            ...mapMutations(['mutateToken'])
        },
        watch : {
            async token(value){
                axios.defaults.headers.common['Authorization'] = value;
                if(value){
                    await this.validateToken()
                }
            }
        }
    }
</script>
