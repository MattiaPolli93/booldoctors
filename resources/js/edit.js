window.Vue = require('vue');

const Edit = {
  data() {
    return {
      numService: 1
    }
  },
  methods: {
    addService() {
      this.numService++;
    }
  }
}

Vue.createApp(Edit).mount('#edit')