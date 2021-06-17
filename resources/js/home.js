window.Vue = require('vue');

const Home = {
    data() {
        return {
            io: 'ciao'
        }
    }
}

Vue.createApp(Home).mount('#home')