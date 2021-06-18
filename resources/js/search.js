import axios from 'axios';

window.Vue = require('vue');

const Search = {
    data() {
        return {
            doctors: [],
            spec: '',
            filterDoc: [],
            sponsoredDocs: [],
            filterSponsoredDocs: [],

        }
    },
    methods: {
        filterSpec() {
            let allDoctors = [];
            this.filterDoc = [];
            for (var i = 0; i < this.doctors.length; i++) {
                for (var j = 0; j < this.doctors[i].specializations.length; j++) {
                    if (this.doctors[i].specializations[j].id == this.spec) {
                        this.filterDoc.push(this.doctors[i])
                    }
                }
            }
            console.log(allDoctors);
            console.log(this.filterDoc);
            /* for(var i = 0; i < this.sponsoredDocs.length; i++){
               for(var j = 0; j < this.sponsoredDocs[i].length; j++){
                 if(this.sponsoredDocs[i] == this.spec){
                     filterSponsoredDocs.push(this.doctors[i])
                 }
               }
             }
             console.log(this.filterSponsoredDocs);   */
        },
        filterText() {
            this.filterDoc = []; 
            for (var i = 0; i < this.doctors.length; i++){
                for (var j = 0; j < this.doctors[i].specializations.length; j++) {
                    if (this.doctors[i].specializations[j].field.toLowerCase().includes(this.spec.toLowerCase())){

                        if (!this.filterDoc.includes(this.doctors[i])) this.filterDoc.push(this.doctors[i]);

                    }
                }
            }
        }
    },
    mounted() {
        axios.get("http://localhost:8000/api/v1/doctors")
            .then((risposta) => {
                    this.doctors = risposta.data.data;
                    /* console.log(this.doctors[0].specializations); */
                    axios.get("http://localhost:8000/api/v1/sponsoredDoc")
                        .then((response) => {
                            this.sponsoredDocs = response.data;
                            /* console.log(this.sponsoredDocs); */
                        })
                }

            )
    },
    computed: {
        docLimit() {
            for (let i = this.doctors.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                const temp = this.doctors[i];
                this.doctors[i] = this.doctors[j];
                this.doctors[j] = temp;
            }
            return this.doctors.slice(0, 5)
        }
    }
}

Vue.createApp(Search).mount('#search')


for (let i = this.doctors.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    const temp = this.doctors[i];
    this.doctors[i] = this.doctors[j];
    this.doctors[j] = temp;
}
