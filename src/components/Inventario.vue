<template>
    <!--  <h4>Inventario</h4> -->
    <div>
        <b-card overlay class="bannerinicioInvetario" img-alt="Card Image" text-variant="white" title="Image Overlay"
            sub-title="Subtitle">
            <b-card-text class="">
                <h1 class="textobanner1">| Maquinaria Disponible </h1>
                <!-- <router-link class="botonbanner" :to="{ path: '/inventario' }"> Ver inventario </router-link> -->
            </b-card-text>
        </b-card>
    </div>

    <div class="container-fluid back">
        <div class="row">
            <!-- Columna izquierda: 25% -->
            <div class="col-md-3">
                <h4 class="fw-bold mb-4 catego1">CATEGORÍA</h4>
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

                        <div class="grid-categorias1">
                            <router-link v-for="disponible in disponible" :key="disponible.nombre" :to="disponible.link"
                                class="card-categoria">
                                <img :src="disponible.imagen" :alt="disponible.nombre" />
                                <h3 class="nombre">{{ disponible.nombre }}</h3>
                                <p class="cate">{{ disponible.categoria }}</p>
                                <p v-if="disponible.precio" class="precio">{{ disponible.precio }}</p>
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

import { ref } from 'vue';

const selectedItem = ref(null);

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
        precio: "$1,200,000 MXN",
        imagen: '/src/assets/CamionSer.jpg',
        link: '/gruas',
    }, {
        nombre: 'ALTEC AC38-127S-EJ MONTAD',
        categoria: "Elevador",
        precio: "",
        imagen:'/src/assets/CamionSer.jpg',
        link: '/elevadores',
    }, {
        nombre: 'ALTEC AC38-127S-EJ MONTAD',
        categoria: "Grua",
        precio: "$1,200,000 MXN",
        imagen: '/src/assets/CamionSer.jpg',
        link: '/gruas',
    },
]
</script>

