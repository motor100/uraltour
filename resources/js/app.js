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

import AddCategoryComponent from './components/AddCategoryComponent.vue';

import ListCategoryComponent from './components/ListCategoryComponent.vue';

// Регистрация компонента глобально
const app = createApp({});

app.component('AddProductComponent', AddProductComponent);
app.mount('#app');

app.component('AddCategoryComponent', AddCategoryComponent);
app.mount('#app1');

app.component('ListCategoryComponent', ListCategoryComponent);
app.component('AddCategoryComponent', AddCategoryComponent);
app.mount('#app2');
