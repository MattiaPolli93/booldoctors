import axios from 'axios';

window.Vue = require('vue');

const Search = {
    data() {
      return {
          doctors : [],
          spec: '', 
          filterDoc : []    
      }
    },
    methods: {
        filterSpec(){
           for(var i = 0; i < this.doctors.length; i++){
               for(var j = 0; j < this.doctors[i].specializations.length; j++){
                   if(this.doctors[i].specializations[j].id == this.spec){
                        this.filterDoc.push(this.doctors[i])
                   }
               }
           }           
        },        
    },
    mounted() {
        axios.get("http://localhost:8000/api/v1/doctors")
        .then((risposta) => {
            this.doctors = risposta.data.data; 
            console.log(this.doctors[0].specializations);
        }
    )}
}
  
Vue.createApp(Search).mount('#search')