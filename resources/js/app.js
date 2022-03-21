import Vue from 'vue'
import Index from './components/Index'
import router from './router'
import vHeader from './components/Header'

require('./bootstrap');

new Vue({
    el: '#app',

    components: {
        Index,
        vHeader
    },

    router
})
 