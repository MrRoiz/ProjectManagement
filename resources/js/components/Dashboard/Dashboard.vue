<template>
    <v-container>
        <v-navigation-drawer app>
            <!-- Header Sidebar -->
            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title class="text-h6">
                        <v-icon>fa fa-clipboard-check</v-icon> Project Management
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        Track your projects
                    </v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>

            <v-divider class='mx-3'/>

            <!-- Items Sidebar -->
            <v-list dense nav>
                <v-list-item-group v-model="selected">
                    <router-link v-for='feature of features' :key='feature.route' :to="feature.route" class="text-decoration-none">
                        <v-list-item link>

                            <v-list-item-icon>
                                    <v-icon>{{ feature.icon }}</v-icon>
                            </v-list-item-icon>

                            <v-list-item-content>
                                <v-list-item-title>{{ feature.feature }}</v-list-item-title>
                            </v-list-item-content>

                        </v-list-item>
                    </router-link>
                </v-list-item-group>
            </v-list>


        </v-navigation-drawer>

        <v-app-bar app>
            <v-row class='d-flex justify-end'>
                <v-tooltip bottom>

                    <template v-slot:activator="{ on, attrs }">
                        <v-btn
                            v-bind="attrs"
                            v-on="on"
                            text
                            @click="showAlert('I told you')"
                        >
                            <v-icon>fa fa-cogs</v-icon>
                        </v-btn>
                    </template>
                    <span>This button does absolutely nothing</span>

                </v-tooltip>
            </v-row>
        </v-app-bar>

       
        <v-main>
            <v-container fluid>
                <router-view></router-view>
            </v-container>
        </v-main>

        <v-footer app>
            <v-col class="text-center" cols="12">
				<strong>Made by Oscar Ruiz</strong>
			</v-col>
        </v-footer>
    </v-container>
</template>

<script>
    import { mapMutations } from 'vuex'

    export default {
        data : ()=>({
            selected : 0,
            features : [
                {
                    icon : 'fa fa-chart-line',
                    feature : 'Dashboard',
                    route : '/dashboard'
                },
                {
                    icon : 'fa fa-industry',
                    feature : 'Companies',
                    route : '/dashboard/companies'
                },
                {
                    icon : 'fa fa-folder-open',
                    feature : 'Projects',
                    route : '/dashboard/projects'
                }
            ]
        }),
        methods : {
            ...mapMutations(['showAlert'])
        }
    }
</script>