import Vue from 'vue'
import Router from 'vue-router'
import LoginComponent from '../../components/Login/Login.vue'
import SignUpComponent from '../../components/SignUp/SignUp.vue'

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
		}
    ]
})

export default routerConfig