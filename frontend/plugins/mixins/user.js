import Vue from 'vue'
import { mapGetters } from 'vuex'

    const User = {
        install(Vue, options) {
            Vue.mixin({
                computed: {
                    ...mapGetters({
                        user: 'auth/user',
                        authenticated: 'auth/authenticated',  
                        logincount: 'auth/logincount', 
                        ability: 'auth/ability',               
                    })
                }
            })
        }
    };

    Vue.use(User);