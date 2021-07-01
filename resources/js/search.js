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
                }

            );

        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const SpecializationUrl = urlParams.get('specialization')
        this.spec = SpecializationUrl;
        console.log(SpecializationUrl);
        setTimeout(() => {           
            let now = dayjs();
            if (SpecializationUrl == null) {
                for (var i = 0; i < this.doctors.length; i++) {
                    if (dayjs(this.doctors[i].expire_date) > now) {
                        this.filterSponsoredDocs.push(this.doctors[i]);
                        console.log(this.filterSponsoredDocs);
                    } else {
                        this.filterDoc.push(this.doctors[i]);
                        console.log(this.filterDoc);
                    }
                }
            } else {
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
            }
            this.loading = false;
        }, 1500);        
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
            if (this.loading == true || this.doctors.length > 0 && this.filterDoc.length > 0 || this.filterSponsoredDocs.length > 0 || this.spec == null) return false;
            return true;
        }, 
        maxRange() {
            let maxRange = 0;
            this.doctors.forEach(element => {
                if (element.RateInfo.RateCout > maxRange) {
                    maxRange = element.RateInfo.RateCout
                }
            });

            return maxRange;
        },
    }
}

Vue.createApp(Search).mount('#search')
