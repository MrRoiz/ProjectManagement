import Vue from 'vue'
import Router from 'vue-router'
import Store from '../vuex/store'
import LoginComponent from '../../components/Login/Login.vue'
import SignUpComponent from '../../components/SignUp/SignUp.vue'
import DashboardComponent from '../../components/Dashboard/Dashboard.vue'
import ProjectsComponent from '../../components/Dashboard/Views/Projects/Projects.vue'
import CompaniesComponent from '../../components/Dashboard/Views/Companies/Companies.vue'
import ContentDashboardComponent from '../../components/Dashboard/Views/Dashboard/Dashboard.vue'


Vue.use(Router)

const routerConfig = new Router({
    mode : 'history',
	routes : [
		{
			path : '/',
			component : LoginComponent
		},
		{
			path : '/signup',
			component : SignUpComponent
		},
		{
			path : '/dashboard',
			component : DashboardComponent,
			children : [
				{
					path : '/',
					component : ContentDashboardComponent
				},
				{
					path : 'companies',
					component : CompaniesComponent
				},
				{
					path : 'projects',
					component : ProjectsComponent
				}
			]
		}
    ]
})

routerConfig.beforeEach((to, from, next) => {
	let isAuthenticated = Store.getters.isAuthenticated

	if ((to.path != '/' && to.path != '/signup') && !isAuthenticated) next('/')
	else next()

})

export default routerConfig