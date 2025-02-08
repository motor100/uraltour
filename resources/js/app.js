import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Vue
// import {createApp} from 'vue';

// Vue
// Импорт для рендера шаблона глобального компонента
import { createApp } from 'vue/dist/vue.esm-bundler.js'

// Main component
// import App from './App.vue';

import AddProductComponent from './components/AddProductComponent.vue';

// Регистрация компонента глобально
const app = createApp({});

app.component('AddProductComponent', AddProductComponent);
app.mount('#app');
