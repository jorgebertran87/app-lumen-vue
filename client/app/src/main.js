import Vue from 'vue'
import App from './App.vue'
import axios from 'axios'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)

Vue.config.productionTip = false
Vue.prototype.$http = axios

new Vue({
  render: h => h(App),
}).$mount('#app')
