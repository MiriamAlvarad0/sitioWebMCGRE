import { createApp } from 'vue'
import App from './App.vue'
import { createRouter, createWebHistory } from 'vue-router'
import routes from './routes.js'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap'


const router = createRouter({
    history: createWebHistory(),
    routes
})


const app = createApp(App)


app.use(router)
app.mount('#app')


//createApp(App).mount('#app')
