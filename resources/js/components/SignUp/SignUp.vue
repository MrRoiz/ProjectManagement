<template>
    <full-centered-content>
        <v-card :loading='loading'>
            <v-card-title>Sign up</v-card-title>
            <v-card-subtitle>Create an account</v-card-subtitle>
            <v-divider class='mx-3'/>

            <v-card-text>
                <v-form ref='signUpForm' @submit.prevent='dispatchSignup'>
                    <v-row>
                        <v-col>
                            <v-text-field
                                v-model='form.name'
                                label='Name'
                                :rules='rules.name'
                            />
                        </v-col>
                        <v-col>
                            <v-text-field
                                v-model='form.email'
                                label='Email'
                                :rules='rules.email'
                            />
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col>
                            <v-text-field
                                type='password'
                                v-model='form.password'
                                label='Password'
                                :rules='rules.password'
                            />
                        </v-col>
                        <v-col>
                            <v-text-field
                                type='password'
                                v-model='form.password_confirmation'
                                label='Password confirmation'
                                :rules='[...rules.password_confirmation,passwordConfirmationRule]'
                            />
                        </v-col>
                    </v-row>
                </v-form>
            </v-card-text>
            <v-card-actions class='d-flex justify-end pa-4'>
                
                <router-link to='/' class='routerLink mr-3' :is="loading ? 'span' : 'router-link'">
                    <v-btn :disabled="loading">Cancel</v-btn>
                </router-link>

                <v-btn @click='dispatchSignup' :disabled="loading">Register</v-btn>
            </v-card-actions>
        </v-card>
    </full-centered-content>
</template>

<script>
    import FullCenteredContent from '../Common/FullCenteredContent.vue'
    import { mapActions, mapMutations } from 'vuex'

    export default{
        components : {
            FullCenteredContent
        },
        data : ()=>({
            loading : false,
            form : {
                name : '',
                email : '',
                password : '',
                password_confirmation : '',
            },
            rules : {
                name : [
                    value => !!value || 'Required field'
                ],
                email : [
                    value => !!value || 'Required field',
                    value => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(value) || 'Must be a valid email'
                ],
                password : [
                    value => !!value || 'Required field',
                    value => value.length >= 8 || 'Password must have at least 8 characters'
                ],
                password_confirmation : [
                    value => !!value || 'Required field'
                ]
            }
        }),
        computed : {
            passwordConfirmationRule(){
                return value => this.form.password == value || 'Password confirmation does not match with password field'
            }
        },
        methods : {
            ...mapActions(['signup']),
            ...mapMutations(['showAlert']),
            async dispatchSignup(){
                if(this.$refs.signUpForm.validate()){
                    this.loading = true
                    try{
                        this.showAlert((await this.signup(this.form)).message)
                        this.$router.push('/')
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