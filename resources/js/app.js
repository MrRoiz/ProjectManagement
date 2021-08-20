require('./bootstrap');
window.Vue = require('vue').default;

import App from './components/App.vue';
import vuex from './plugins/vuex/store'
import vuetify from './plugins/vuetify/vuetify';

new Vue({
    render : render=>render('App'),
    components : {
        App
    },
    vuex,
    vuetify
}).$mount('#app');
