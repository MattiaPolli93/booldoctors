import axios from 'axios';

window.Vue = require('vue');

const Search = {
    data() {
      return {
          doctors : [],        
      }
    },
    mounted() {
        axios.get("http://localhost:8000/api/v1/doctors")
        .then((risposta) => {
            this.doctors = risposta.data.data;
            console.log(this.doctors);
        }
    )}
}
  
Vue.createApp(Search).mount('#search')