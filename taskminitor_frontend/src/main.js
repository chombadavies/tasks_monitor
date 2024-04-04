import { createApp } from 'vue';
import App from './App.vue'; // The root component
import router from './router'; // Make sure you have this file set up for routing

const app = createApp(App);
app.use(router); // Use the router
app.mount('#app');
