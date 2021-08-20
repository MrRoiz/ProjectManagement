<template>
    <full-centered-content>
        <v-card>
            <v-card-title>Login</v-card-title>
            <v-card-text>
                <v-form @submit.prevent="">

                </v-form>
            </v-card-text>
            <v-card-actions class="d-flex justify-end pa-4">

                <router-link to="/signup" class="routerLink mr-3">
                    <v-btn>Sign Up</v-btn>
                </router-link>

                <v-btn>Sign In</v-btn>
            </v-card-actions>
        </v-card>
    </full-centered-content>
</template>

<script>
    import FullCenteredContent from '../Common/FullCenteredContent.vue';

    export default{
        components : {
            FullCenteredContent
        }
    }
</script>