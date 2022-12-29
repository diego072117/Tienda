import './bootstrap';
import { createApp } from 'vue';
import vSelect from 'vue-select'

// components ------------------------------
import ExampleComponent from './components/ExampleComponent.vue';
import ProductList from './components/products/Index.vue';
import CategoryList from './components/categories/Index.vue';



const app = createApp({
    components:{
        ExampleComponent,
        ProductList,
        CategoryList
    }
});

app.component('v-select', vSelect)
app.mount('#app');
