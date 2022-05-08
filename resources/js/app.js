require('./bootstrap');

import { createApp } from 'vue';

import ImageSearch from './components/ImageSearch/Index';
import GoogleAddress from './components/GoogleAddress/Index';

const app = createApp({});

app.component('image-search', ImageSearch);
app.component('google-address', GoogleAddress);

app.mount('#app');
