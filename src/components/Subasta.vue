<template>
  <div>
    <b-card overlay class="bannerSubasta" img-alt="Card Image" text-variant="white" title="Image Overlay" sub-title="Subtitle">
      <b-card-text>
        <h1 class="textobannerSubasta">| Maquinaria en Subasta </h1>
      </b-card-text>
    </b-card>
  </div>

  <div class="container-fluid back">
    <div class="row justify-content-center">
      <div class="col-12 col-md-9">
        <div class="p-4">
          <section class="macdisponible">
            <div class="row g-4">
              <div
                v-for="disponibleItem in disponible.filter(d => d.precio && d.precio.trim() !== '')"
                :key="disponibleItem.nombre"
                class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex"
              >
                <router-link :to="disponibleItem.link" class="card-categoria1 h-100 d-flex flex-column justify-content-between">
                  <img :src="disponibleItem.imagen" :alt="disponibleItem.nombre" />
                  <div class="card-content mt-3">
                    <h3 class="nombre">{{ disponibleItem.nombre }}</h3>
                    <p class="cate">{{ disponibleItem.categoria }}</p>
                    <div class="fecha-cierre">
                     <i class="fas fa-clock"></i>
                      <span>{{ disponibleItem.fechaCierre }}</span>
                    </div>
                    <!-- Precio no mostrado -->
                  </div>
                  <button class="btn-ofertar">Ofertar ahora</button>
                </router-link>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import "./Styles/SubastaStyle.css"
import { ref, onMounted } from 'vue';

const disponible = ref([]);

onMounted(() => {
  disponible.value = [
    {
      nombre: 'ALTEC AC38-127S-EJ MONTAD',
      categoria: "Grua",
      precio: "$1,200,000 MXN",
      imagen: '/src/assets/CamionSer.jpg',
      link: '/gruas',
      fechaCierre: 'Cierra 3 Jun - 4 Jun'
    },
    {
      nombre: 'ELEVADOR X3',
      categoria: "Elevador",
      precio: "$850,000 MXN",
      imagen: '/src/assets/CamionSer.jpg',
      link: '/elevadores',
      fechaCierre: 'Cierra 5 Jun - 6 Jun'
    },
    {
      nombre: 'RETROEXCAVADORA Z5',
      categoria: "Maquinaria Pesada",
      precio: "",
      imagen: '/src/assets/CamionSer.jpg',
      link: '/maquinaria',
      fechaCierre: 'Cierra 7 Jun - 8 Jun'
    },
    {
      nombre: 'MONTACARGA 2023',
      categoria: "Montacarga",
      precio: "$620,000 MXN",
      imagen: '/src/assets/CamionSer.jpg',
      link: '/montacargas',
      fechaCierre: 'Cierra 9 Jun - 10 Jun'
    },
    {
      nombre: 'TITAN 9000',
      categoria: "Grua",
      precio: "",
      imagen: '/src/assets/CamionSer.jpg',
      link: '/gruas',
      fechaCierre: 'Cierra 11 Jun - 12 Jun'
    }
  ];
});
</script>
