<template>
    <!--  <h4>Inventario</h4> -->
    <div>
        <b-card overlay class="bannerinicio" img-alt="Card Image" text-variant="white" title="Image Overlay"
            sub-title="Subtitle">
            <b-card-text class="">
                <h1 class="textobanner">| Proveedor </h1>
                <!-- <router-link class="botonbanner" :to="{ path: '/inventario' }"> Ver inventario </router-link> -->
            </b-card-text>
        </b-card>
    </div>

    <div class="container-fluid back">
        <div class="row">
            <!-- Columna izquierda: 25% -->
            <div class="col-md-3">
                <h4 class="fw-bold mb-4 catego">CATEGORÍA</h4>
                <div class="accordion" id="categoryAccordion">
                    <div v-for="(category, index) in categories" :key="index" class="accordion-item">
                        <h2 class="accordion-header" :id="'heading' + index">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                :data-bs-target="'#collapse' + index" aria-expanded="false"
                                :aria-controls="'collapse' + index">
                                {{ category.name }}
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse" :id="'collapse' + index"
                            :aria-labelledby="'heading' + index" data-bs-parent="#categoryAccordion">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li v-for="item in category.subcategories" :key="item.name" class="selectable-item"
                                        :class="{ active: selectedItem === item.name }" @click="selectItem(item.name)">
                                        {{ item.name }} ({{ item.count }})
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="selectedItem" class="mt-3 text-muted small">
                    Seleccionado: <strong>{{ selectedItem }}</strong>
                </div>

            </div>

            <!-- Columna derecha: 75% -->
            <div class="col-md-9">
                <div class="p-4">
                    <!-- Contenido principal aquí -->
                    <section class="macdisponible">
                        <div class="grid-categorias">
                            <router-link v-for="item in filteredDisponible" :key="item.nombre"
                                :to="{ path: '/informacion', state: { maquinaria: item } }"
                                @click.native="guardarMaquinaria(item)" class="card-categoria">

                                <img :src="item.imagen" :alt="item.nombre" />
                                <h3 class="nombre">{{ item.nombre }}</h3>
                                <p class="subcate">{{ item.subcategoria }}</p>

                                <p v-if="item.precio && item.precio.trim() !== ''" class="precio">{{ item.precio }}</p>
                                <p v-else class="llamar">Llamar para preguntar precio</p>
                            </router-link>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>




</template>



<script setup>
import { ref, computed } from 'vue';

const selectedItem = ref(null);

const guardarMaquinaria = (item) => {
    localStorage.setItem('maquinariaSeleccionada', JSON.stringify(item));
};

const selectItem = (item) => {
    selectedItem.value = item;
};

const categories = [
    {
        name: 'ELEVADORES',
        subcategories: [
            { name: 'Montacarga', count: 1 },
            { name: 'Articulada', count: 3 },
            { name: 'Tijera', count: 10 },
        ],
    },
    {
        name: 'CAMIONES',
        subcategories: [
            { name: 'De Plataforma', count: 1 },
            { name: 'De Servicio', count: 3 },
        ],
    },
    {
        name: 'MAQUINARIA PESADA',
        subcategories: [
            { name: 'Retro Excavadora', count: 1 },
        ],
    },
    {
        name: 'GRUAS',
        subcategories: [
            { name: 'Titan', count: 1 },
            { name: 'Articulada', count: 3 },
        ],
    },
];

const disponible = [
    {
        nombre: 'ALTEC AC38-127S-EJ MONTAD',
        categoria: "Grua",
        subcategoria: "Titan",
        precio: "$1,200,000 MXN",
        imagen: '/src/assets/CamionSer.jpg',
        link: '/informacion',
    },
    {
        nombre: 'ALTEC AC38-127S-EJ MONTAD',
        categoria: "Elevador",
        subcategoria: "Tijera",
        precio: "",
        imagen: '/src/assets/CamionSer.jpg',
        link: '/informacion',
    },
    {
        nombre: 'ALTEC AC38-127S-EJ MONTAD',
        categoria: "Grua",
        subcategoria: "Articulada",
        precio: "$1,200,000 MXN",
        imagen: '/src/assets/CamionSer.jpg',
        link: '/informacion',
    },
];

// Computed: Filtra según la subcategoría seleccionada
const filteredDisponible = computed(() => {
    if (!selectedItem.value) return disponible;
    return disponible.filter(item => item.subcategoria === selectedItem.value);
});
</script>



<style scoped>
/* Estilos generales */
* {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Asegura que no se desborde horizontalmente */
body {
    overflow-x: hidden;
}

/* Contenedor del banner */
.topbar {
    width: 100%;
    background-color: #212529;
    overflow-x: hidden;
}

/* Banner con imagen de fondo responsive */
.bannerinicio {
    background-image: url('/src/assets/inventarioBanner.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    height: 40vh;
    /* se adapta a la altura del viewport */
    width: 100%;
    padding: 0 5%;
    position: relative;
}



.card-categoria {
    padding: 10px;
}


.catego {
    font-weight: bold;
    color: #2f2f2f;
    text-align: center;
    font-size: 2.2rem;
    margin-top: 50px;
}

.accordion-button {
    background-color: #f3f3f3;
    color: #13213c;
    font-weight: bold;
}

.accordion-button:not(.collapsed) {
    background-color: #1998d4;
    color: white;
}

.accordion-body ul li {
    padding: 5px 0;
    color: #555;
}

/* NUEVO: estilos para ítems seleccionables */
.selectable-item {
    padding: 8px 12px;
    cursor: pointer;
    border-radius: 2px;
    transition: background-color 0.2s;
}

.selectable-item:hover {
    background-color: #f0f0f0;
}

/* .selectable-item.active {
    background-color: #262f69;
    color: white;
    font-weight: bold;
} */

/* Texto del banner */
.textobanner {
    color: white;
    z-index: 2;
    font-size: 2.7rem;
    font-weight: bold;
    max-width: 600px;
    margin-left: 80px;
    text-align: center;
    margin-top: 100px;
}

/* Títulos responsivos */
.textobanner h1 {
    font-size: 4rem;
    margin: 0;
    white-space: nowrap;

    /* Evita salto de línea para que esté todo junto */
}

/* RESPONSIVE MEDIA QUERIES */
@media (max-width: 768px) {
    .bannerinicio {
        height: 50vh;
        padding: 0 20px;
        justify-content: center;
        text-align: center;
    }

    .textobanner {
        margin: 0;
        font-size: 1.8rem;
    }

    .textobanner h1 {
        font-size: 2.2rem;
        white-space: normal;
        /* Permite saltos en móvil para que no se corte */
    }

    .botonbanner {
        font-size: 1.2rem;
        padding: 8px 16px;
    }
}

/* === ESTILOS MACQUINARIA DISPONIBLE === */

.back {
    background-color: #f9f9f9;
}

.llamar {
    font-weight: bold;
    color: rgb(241, 107, 11);
    margin-top: 8px;
    font-size: 1.2rem;
    text-align: left;
}

.nombre {
    color: #0f0f0f;
    font-size: 1.2rem;
    margin-top: 10px;
    font-weight: bold;
}

.precio {
    font-weight: bold;
    color: rgb(241, 107, 11);
    margin-top: 8px;
    font-size: 1.2rem;
}

.subcate {
    color: #706f6f;
    font-size: 1.2rem;
    margin-top: px;
}


/*Macdisponible es el cuandro donde estan metidas las cards y el diseño */
.macdisponible {
    padding: 40px 30px;
    text-align: center;
    font-size: 3rem;
    margin-bottom: 10px;
    /* antes tenía 30px */
    color: #212529;
    padding-top: 20px;
}



.card-categoria:hover {
    transform: translateY(-5px);
}

.grid-categorias {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 20px;
  justify-content: center;
}

.card-categoria {
  background-color: rgb(255, 255, 255);
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  text-decoration: none;
  color: inherit;
  transition: transform 0.3s ease;
  max-width: 280px;
  width: 100%;
  margin: 0 auto;
}

.card-categoria:hover {
  transform: translateY(-5px);
}

.card-categoria img {
  width: 100%;
  height: auto;
  object-fit: cover;
  aspect-ratio: 1 / 1;
  border-radius: 12px 12px 0 0;
  display: block;
}


</style>