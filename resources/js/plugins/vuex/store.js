import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

const Store = new Vuex.Store({
    state : {
        global : {
            auth : {
                token : null
            },
            snackbar : {
				show   : false,
				message: ''
			}
        }
    },
    mutations : {
        mutateToken(state,token){
            localStorage.token = token
            state.global.auth.token = token
        },
        showAlert(state,message){
			state.global.snackbar.show = true
			state.global.snackbar.message = message
		},
        defineShowAlert(state,boolean){
			state.global.snackbar.show = boolean
		}
    },
    actions : {
        signup({ commit }, payload){
            return new Promise((resolve,reject)=>{
                axios.post('api/signup',payload).then(res=>{
                    if(res.status == 201) resolve(res.data)
                    else reject(res.data)
                }).catch(error=>{
                    if(error?.response.data) error = error.response.data
                    reject(error)
                });
            });
        },
        signin({commit},payload){
            return new Promise((resolve,reject)=>{
                axios.post('api/login',payload).then(res=>{
                    if(res.status == 200){
                        commit('mutateToken',res.data.data.tokenWithPrefix)
                        resolve()
                    }else{
                        commit('mutateToken',null)
                        reject(res.data)
                    }
                }).catch(error=>{
                    if(error?.response.data) error = error.response.data
                    commit('mutateToken',null)
                    reject(error)
                });
            });
        },
        validateToken({commit}){
            return new Promise((resolve)=>{
                axios.get('api/validateToken').then(res=>{
                    if(res.status != 200) commit('mutateToken',null)
                    resolve()
                }).catch(error=>{
                    commit('mutateToken',null)
                    resolve()
                });
            });
        }
    }
});

export default Store;