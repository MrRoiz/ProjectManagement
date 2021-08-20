import './bootstrap'

import Vue from 'vue'
import App from './components/App.vue'
import store from './plugins/vuex/store'
import vuetify from './plugins/vuetify/vuetify'
import router from './plugins/router/router'

new Vue({
    render : render=>render('App'),
    components : {
        App
    },
    store,
    vuetify,
    router
}).$mount('#app')
