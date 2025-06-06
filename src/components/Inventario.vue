<template>
  <!-- Banner -->
  <div>
    <b-card overlay class="bannerinicio" img-alt="Card Image" text-variant="white" title="Image Overlay" sub-title="Subtitle">
      <b-card-text>
        <h1 class="textobanner">| {{ bannerText }} </h1>
      </b-card-text>
    </b-card>
  </div>

  <div class="container-fluid back">
    <div class="row">
      <!-- Columna izquierda: filtros -->
      <div class="col-md-3">
        <h4 class="fw-bold mb-4 catego">CATEGORÍA</h4>
        <div class="accordion" id="categoryAccordion">
          <div v-for="(category, index) in categories" :key="index" class="accordion-item">
            <h2 class="accordion-header" :id="'heading' + index">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse' + index" aria-expanded="false" :aria-controls="'collapse' + index">
                {{ category.name }}
              </button>
            </h2>
            <div class="accordion-collapse collapse" :id="'collapse' + index" :aria-labelledby="'heading' + index" data-bs-parent="#categoryAccordion">
              <div class="accordion-body">
                <ul class="list-unstyled">
                  <li v-for="item in category.subcategories" :key="item.name" class="selectable-item" :class="{ active: selectedItem === item.name }" @click="selectItem(item.name)">
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

      <!-- Columna derecha: lista paginada -->
      <div class="col-md-9">
        <div class="p-4">
          <section class="macdisponible">
            <div class="grid-categorias">
              <router-link
                v-for="item in paginatedItems"
                :key="item.nombre"
                :to="{ path: '/informacion', state: { maquinaria: item } }"
                @click.native="guardarMaquinaria(item)"
                class="card-categoria"
              >
                <img :src="item.imagen" :alt="item.nombre" />
                <h3 class="nombre">{{ item.nombre }}</h3>
                <p class="subcate">{{ item.subcategoria }}</p>
                <p v-if="item.precio && item.precio.trim() !== ''" class="precio">{{ item.precio }}</p>
                <p v-else class="llamar">Llamar para preguntar precio</p>
              </router-link>
            </div>

            <!-- Controles de paginación -->
            <nav aria-label="Paginación" class="mt-4 d-flex justify-content-center">
              <ul class="pagination">
                <li class="page-item" :class="{ disabled: currentPage === 1 }">
                  <button class="page-link" @click="prevPage" :disabled="currentPage === 1">Anterior</button>
                </li>

                <li
                  v-for="page in totalPages"
                  :key="page"
                  class="page-item"
                  :class="{ active: currentPage === page }"
                >
                  <button class="page-link" @click="goToPage(page)">{{ page }}</button>
                </li>

                <li class="page-item" :class="{ disabled: currentPage === totalPages }">
                  <button class="page-link" @click="nextPage" :disabled="currentPage === totalPages">Siguiente</button>
                </li>
              </ul>
            </nav>

          </section>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue';
import { useRoute } from 'vue-router';





const route = useRoute();
const categoriaSeleccionada = ref(route.query.categoria || null);

watch(() => route.query.categoria, (nuevaCategoria) => {
  categoriaSeleccionada.value = nuevaCategoria;
});

// Datos y estado
const selectedItem = ref(null);
const ITEMS_PER_PAGE = 8;
const currentPage = ref(1);

// Al cambiar filtro, resetear página
watch([selectedItem, categoriaSeleccionada], () => {
  currentPage.value = 1;
});

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

// Ejemplo ampliado a 10 items (combinando y repitiendo para mostrar paginación)
const disponible = [
  { nombre: 'Grua Titan 1', categoria: "GRUAS", subcategoria: "Titan", precio: "$1,200,000 MXN", imagen: '/src/assets/CamionSer.jpg' },
  { nombre: 'Grua Titan 2', categoria: "GRUAS", subcategoria: "Titan", precio: "$1,300,000 MXN", imagen: '/src/assets/CamionSer.jpg' },
  { nombre: 'Grua Articulada 1', categoria: "GRUAS", subcategoria: "Articulada", precio: "$1,400,000 MXN", imagen: '/src/assets/CamionSer.jpg' },
  { nombre: 'Grua Articulada 2', categoria: "GRUAS", subcategoria: "Articulada", precio: "$1,500,000 MXN", imagen: '/src/assets/CamionSer.jpg' },
  { nombre: 'Grua Articulada 3', categoria: "GRUAS", subcategoria: "Articulada", precio: "$1,600,000 MXN", imagen: '/src/assets/CamionSer.jpg' },
  { nombre: 'Montacarga 1', categoria: "ELEVADORES", subcategoria: "Montacarga", precio: "$800,000 MXN", imagen: '/src/assets/CamionSer.jpg' },
  { nombre: 'Tijera 1', categoria: "ELEVADORES", subcategoria: "Tijera", precio: "$700,000 MXN", imagen: '/src/assets/CamionSer.jpg' },
  { nombre: 'Retro Excavadora 1', categoria: "MAQUINARIA PESADA", subcategoria: "Retro Excavadora", precio: "$2,000,000 MXN", imagen: '/src/assets/CamionSer.jpg' },
  { nombre: 'De Plataforma 1', categoria: "CAMIONES", subcategoria: "De Plataforma", precio: "$900,000 MXN", imagen: '/src/assets/CamionSer.jpg' },
  { nombre: 'De Servicio 1', categoria: "CAMIONES", subcategoria: "De Servicio", precio: "$950,000 MXN", imagen: '/src/assets/CamionSer.jpg' },
];

// Filtra según subcategoria o categoria seleccionada
const filteredDisponible = computed(() => {
  if (selectedItem.value) {
    return disponible.filter(item => item.subcategoria === selectedItem.value);
  }
  if (categoriaSeleccionada.value) {
    return disponible.filter(item => item.categoria.toLowerCase() === categoriaSeleccionada.value.toLowerCase());
  }
  return disponible;
});

// Items que se muestran según la página actual
const paginatedItems = computed(() => {
  const start = (currentPage.value - 1) * ITEMS_PER_PAGE;
  return filteredDisponible.value.slice(start, start + ITEMS_PER_PAGE);
});

// Total páginas para la paginación
const totalPages = computed(() => Math.ceil(filteredDisponible.value.length / ITEMS_PER_PAGE));

// Métodos para cambiar de página
const goToPage = (page) => {
  if (page >= 1 && page <= totalPages.value) {
    currentPage.value = page;
  }
};

const nextPage = () => {
  if (currentPage.value < totalPages.value) currentPage.value++;
};

const prevPage = () => {
  if (currentPage.value > 1) currentPage.value--;
};

const bannerText = computed(() => {
  if (selectedItem.value) {
    return `${selectedItem.value} Disponibles`;
  }
  if (categoriaSeleccionada.value) {
    return `${categoriaSeleccionada.value} Disponibles`;
  }
  return 'Maquinaria Disponible';
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