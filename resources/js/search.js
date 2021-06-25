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
            loading: true,
            selectRate: '',
            numberOfRates: 0,
        }
    },
    methods: {
        filterSpec() {
            let now = dayjs();
            console.log(now);
            let allDoctors = [];
            this.filterDoc = [];
            for (var i = 0; i < this.doctors.length; i++) {
                for (var j = 0; j < this.doctors[i].specializations.length; j++) {
                    if (this.doctors[i].specializations[j].id == this.spec) {

                    }
                }
            }
            // console.log(allDoctors);
            // console.log(this.filterDoc);
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
            this.filterSponsoredDocs = [];
            let now = dayjs();
            this.loading = false;
            for (var i = 0; i < this.doctors.length; i++) {
                for (var j = 0; j < this.doctors[i].specializations.length; j++) {
                    if (this.doctors[i].specializations[j].field.toLowerCase().includes(this.spec.toLowerCase())) {
                        if (!this.filterDoc.includes(this.doctors[i]) && !this.filterSponsoredDocs.includes(this.doctors[i])) {
                            console.log(this.filterDoc);
                            if (dayjs(this.doctors[i].expire_date) > now) {
                                this.filterSponsoredDocs.push(this.doctors[i]);
                                console.log(this.filterSponsoredDocs);
                            } else {
                                this.filterDoc.push(this.doctors[i]);
                                console.log(this.filterDoc);
                            }
                        }
                    }
                }
            }
        },
        /* prova() {
            console.log(this.numberOfRates, this.selectRate);
        }, */
    },
    mounted() {
        axios.get("http://localhost:8000/api/v1/doctors")
            .then((risposta) => {
                    this.doctors = risposta.data.data;
                    // console.log(this.doctors);
                    let now = dayjs();
                    console.log(now);
                    this.doctors.forEach(doctor => {

                        if (dayjs(doctor.expire_date) > now) {
                            this.sponsoredDocs.push(doctor);
                        }
                    });
                    /* console.log(this.sponsoredDocs); */
                    // axios.get("http://localhost:8000/api/v1/sponsoredDoc")
                    //     .then((response) => {
                    //         this.sponsoredDocs = response.data;

                    //     })
                }

            );

        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const SpecializationUrl = urlParams.get('specialization')
        /* console.log(SpecializationUrl); */
        this.spec = SpecializationUrl;
        setTimeout(() => {
            for (var i = 0; i < this.doctors.length; i++) {
                for (var j = 0; j < this.doctors[i].specializations.length; j++) {
                    if (this.doctors[i].specializations[j].field.toLowerCase().includes(this.spec.toLowerCase())) {

                        if (!this.filterDoc.includes(this.doctors[i])) this.filterDoc.push(this.doctors[i]);

                    }
                }
            }
            this.loading = false;
        }, 1500);

        if (this.spec == null) {
            this.loading = false;
        }

    },
    computed: {
        docLimit() {
            for (let i = this.sponsoredDocs.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                const temp = this.sponsoredDocs[i];
                this.sponsoredDocs[i] = this.sponsoredDocs[j];
                this.sponsoredDocs[j] = temp;
            }
            return this.sponsoredDocs.slice(0, 5)
        },

        noFindTxt() {
            if (this.doctors.length > 0 && this.filterDoc.length > 0 || this.spec == null) return false;
            return true;
        },

        // loading() {
        //     if (this.doctors.length > 0) return false;
        //     return true;
        // },

        maxRange() {
            let maxRange = 0;
            this.doctors.forEach(element => {
                if (element.RateInfo.RateCout > maxRange) {
                    maxRange = element.RateInfo.RateCout
                }
            });

            return maxRange;
        },
        /* sponsored(){
            if(this.filterDoc.includes(this.sponsoredDocs)){
                this
                console.log(this.sponsoredDocs);
            }
        } */


    }
}

Vue.createApp(Search).mount('#search')
