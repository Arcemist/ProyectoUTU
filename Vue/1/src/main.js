/**
 * main.js
 *
 * Bootstraps Vuetify and other plugins then mounts the App`
 */

// Plugins
import { registerPlugins } from '@/plugins'

// Components
import App from './App.vue'

// Composables
import { createApp } from 'vue'

const app = createApp(App)

registerPlugins(app)

app.mount('#app')

import 'vuetify/dist/vuetify.min.css';
import VueCal from 'vue-cal';
import 'vue-cal/dist/vuecal.css';

Vue.use(Vuetify);
Vue.component('vue-cal', VueCal);

new Vue({
  render: h => h(App),
}).$mount('#app');
