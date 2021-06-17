/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// import { createApp } from 'vue';
require('./bootstrap');

// let app = createApp({})
// app.component('user-info', require('./components/UserInfo.vue').default);
// app.mount("#app")
/* window.Vue = require('vue'); */


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* const app = new Vue({
    el: '#app', */
//     // data: {
//     //     doctors: []
//     // },
//     // mounted() {
//     //     axios.get("https://localhost:8000/api/v1/doctors")
//     //         .then((risposta) => {
//     //             this.doctors = risposta.data;
//     //             console.log(this.doctors);
//     //             //ciclo l'array di album e creo un nuovo array con i generi
//     //             this.albums.forEach((item, i) => {
//     //                 if (!this.genres.includes(item.genre)) {
//     //                     this.genres.push(item.genre);
//     //                 }
//     //             });
//     //             //ordino i dischi per anno d'uscita
//     //             // this.albums.sort(function (a, b) {return a.year - b.year});
//     //             this.albums.sort((a, b) => a.year - b.year);
//     //         });
//     // }
/* }); */
