require('./bootstrap');

import { createApp } from 'vue'
import App from './vue/app.vue'
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
import router from './routes';

createApp(App)
  .use(router)
  .mount("#app");
