import Inicio from "./components/Inicio.vue"
import NotFound from './components/Errors/NotFound.vue'
import Forbidden from "./components/Errors/Forbidden.vue"
import Inventario from "./components/Inventario.vue"
import Acercade from "./components/Acercade.vue"
import Contacto from "./components/Contacto.vue"
import Servicios from "./components/Servicios.vue"
import Subasta from "./components/Subasta.vue"
import Proveedor from "./components/Proveedor.vue"


const routes = [
    {
        path: "/inicio",
        name: "",
        component: Inicio
    },
    {
        path: "/",
        component: Inicio
    },
    {
        path: "/:pathMatch(.*)*",
        name: "NotFound",
        component: NotFound
    },
    {
        path: "/forbidden",
        name: "Forbidden",
        component: Forbidden
    },
    {
    path: "/inventario",
    name: "Inventario",
    component: Inventario
    },
    {
    path: "/acercade",
    name: "AcercaDe",
    component: Acercade
    },
    {
    path: "/contacto",
    name: "Contacto",
    component: Contacto
    },
    {
    path: "/servicios",
    name: "Servicios",
   component: Servicios
    },
    {
    path: "/subasta",
    name: "Subasta",
    component: Subasta
     },
      {
    path: "/proveedor",
    name: "Proveedor",
    component: Proveedor
    },
    
    

    
    
    
    

]


export default routes
