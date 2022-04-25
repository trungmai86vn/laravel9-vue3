require('./bootstrap');

import { createApp } from 'vue';

import ImageSearch from './components/ImageSearch/Index';

const app = createApp({});

app.component('image-search', ImageSearch);

app.mount('#app');
