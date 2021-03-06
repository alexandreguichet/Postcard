/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/Layout.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('layout', require('./components/Layout.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        student: false,
        teacher: false,
        ta: false,
        user: null,
    },
    methods: {
        login(data){
            console.log(data)
            if(data.userType == 'student'){
                this.student = true;
            } else if(data.teacher == 'teacher') {
                this.teacher = true;
            } else if(data.ta == 'ta'){
                this.ta = true;
            };
            this.user = data.user;
            console.log(this.user);
        },
        isStudent() {
            if(this.student){
                return true;
            } else {
                return false;
            }
        },
        isTeacher() {
            if(this.teacher){
                return true;
            } else {
                return false;
            }
        },
        isTa() {
            if(this.ta){
                return true;
            } else {
                return false;
            }
        },
    },
});
