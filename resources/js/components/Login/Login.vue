<template>
    <full-centered-content>
        <v-card>
            <v-card-title>Login</v-card-title>
            <v-card-subtitle>Sign in your account</v-card-subtitle>
            <v-divider class='mx-3'/>

            <v-card-text>
                <v-form @submit.prevent="dispatchSignIn" ref='signInForm'>
                    <v-row>
                        <v-col>
                            <v-text-field
                                label='Email'
                                :rules='rules.email'
                                v-model='form.email'
                            />
                        </v-col>
                        <v-col>
                            <v-text-field
                                label='Password'
                                type='password'
                                :rules='rules.password'
                                v-model='form.password'
                            />
                        </v-col>
                    </v-row>
                </v-form>
            </v-card-text>
            <v-card-actions class="d-flex justify-end pa-4">

                <router-link to="/signup" class="routerLink mr-3" :is="loading ? 'span' : 'router-link'">
                    <v-btn :disabled='loading'>Sign Up</v-btn>
                </router-link>

                <v-btn :disabled='loading' @click='dispatchSignIn'>Sign In</v-btn>
            </v-card-actions>
        </v-card>
    </full-centered-content>
</template>

<script>
    import { mapActions, mapMutations, mapState } from 'vuex'
    import FullCenteredContent from '../Common/FullCenteredContent.vue';

    export default{
        components : {
            FullCenteredContent
        },
        data : ()=>({
            loading : false,
            form : {
                email : '',
                password : '',
            },
            rules : {
                email : [
                    value => !!value || 'Required field',
                    value => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(value) || 'Must be a valid email'
                ],
                password : [
                    value => !!value || 'Required field',
                    value => value.length >= 8 || 'Password must have at least 8 characters'
                ]
            }
        }),
        computed: {
            ...mapState({
                token : state=>state.global.auth.token
            })
        },
        mounted(){
            if(this.token) this.$router.push('/dashboard');
        },
        methods : {
            ...mapActions(['signin']),
            ...mapMutations(['showAlert']),
            async dispatchSignIn(){
                if(this.$refs.signInForm.validate()){
                    this.loading = true
                    try{
                        await this.signin(this.form)
                        this.$router.push('/dashboard')
                    }catch(error){
                        if(error.data){
                            this.showAlert(Object.values(error.data)[0][0])
                        }else{
                            this.showAlert(error.message)
                        }
                    }finally{
                        this.loading = false
                    }
                }
            }
        }
    }
</script>