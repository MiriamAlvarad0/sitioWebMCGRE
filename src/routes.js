import { createRouter, createWebHistory } from "vue-router";
import Inicio from "./components/Inicio.vue";
import NotFound from "./components/Errors/NotFound.vue";
import Forbidden from "./components/Errors/Forbidden.vue";
import Inventario from "./components/Inventario.vue";
import Acercade from "./components/Acercade.vue";
import Contacto from "./components/Contacto.vue";
import Servicios from "./components/Servicios.vue";
import Subasta from "./components/Subasta.vue";
import Proveedor from "./components/Proveedor.vue";
import Informacion from "./components/Informacion.vue";

const routes = [
  {
    path: "/inicio",
    name: "",
    component: Inicio,
  },
  {
    path: "/",
    component: Inicio,
  },
  {
    path: "/:pathMatch(.*)*",
    name: "NotFound",
    component: NotFound,
  },
  {
    path: "/forbidden",
    name: "Forbidden",
    component: Forbidden,
  },
  {
    path: "/inventario",
    name: "Inventario",
    component: Inventario,
  },  
  {
    path: "/acercade",
    name: "AcercaDe",
    component: Acercade,
  },
  {
    path: "/contacto",
    name: "Contacto",
    component: Contacto,
  },
  {
    path: "/servicios",
    name: "Servicios",
    component: Servicios,
  },
  {
    path: "/subasta",
    name: "Subasta",
    component: Subasta,
  },
  {
    path: "/proveedor",
    name: "Proveedor",
    component: Proveedor,
  },
  {
    path: "/informacion",
    name: "Informacion",
    component: Informacion,
  },
  {
    path: "/inventario/:categoria?",
    name: "Inventario",
    component: Inventario, // tu componente Inventario.vue
  },
];
// Aquí creamos el router y agregamos el scroll hacia arriba
const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior(to, from, savedPosition) {
    return { top: 0 }; // Esto fuerza a que cada navegación empiece desde arriba
  },
});

export default routes;

