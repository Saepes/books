import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/user/login', component: () => import('./components/Login'),
            name: 'user.login'
        },

        {
            path: '/user/registration', component: () => import('./components/Registration'),
            name: 'user.registration'
        },

        {
            path: '/', component: () => import('./components/Index'),
            name: 'index'
        },
        {
            path: '/user/export', component: () => import('./components/Export'),
            name: 'user.export'
        },
    ]
})