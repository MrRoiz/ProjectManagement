import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

export default new Vuex.Store({
    state : {

    },
    mutations : {

    },
    actions : {
        signup({ commit }, params){
            axios.post('api/signup',params).then(res=>{
                if(res.status == 201) Promise.resolve()
                else Promise.reject()
            }).catch(err=>{
                Promise.reject()
            });
        }
    }
});

// export default Store;