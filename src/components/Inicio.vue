<template>
  <div>
    <b-card overlay class="bannerDASHBOARD" img-alt="Card Image" text-variant="white" title="Image Overlay"
      sub-title="Subtitle">
      <b-card-text class="textobanner">
        <h1> <span class="naranja">MCGRE EQUIPMENT</span> TU ALIADO </h1>
        <h1>EN MAQUINARIA PESADA</h1>
        <h1>CONFIABLE</h1>
        <router-link class="botonbanner" to="/inventario"> Ver inventario </router-link>
      </b-card-text>
    </b-card>
  </div>

  <!-- Sección de Categorías -->
  <section class="categorias">
    <h2 class="titulo-categorias">ELIGE LA CATEGORIA</h2>
    <p class="descripcion-categorias">
      Contamos con una gran variedad de modelos.
    </p>
    <p class="descripcion-categorias">
      Explore nuestras categorías y encuentre el que se adapte a sus necesidades.
    </p>

    <div class="grid-categorias">
      <router-link
  v-for="categoria in categorias"
  :key="categoria.nombre"
  :to="categoria.link"
  class="card-categoria"
>
  <img :src="categoria.imagen" :alt="categoria.nombre" />
  <h3>{{ categoria.nombre }}</h3>
</router-link>

    </div>

    <!-- Subasta horizontal visualmente igual a las cards -->
    <div class="subasta-horizontal">
      <div class="subasta-content-horizontal">
        <div class="textos-subasta">
          <p class="linea1">Maquinaria en excelente estado, lista para trabajar.</p>
          <p class="linea2">Participa en la subasta ahora.</p>
        </div>
        <router-link :to="{ path: '/subasta' }" class="boton-subasta">
          Ver subasta
        </router-link>
      </div>
    </div>

  <!-- NUESTRAS MARCAS Y MODELOS -->
<div class="container-marcas">
  <h2 class="titulo-marcasModelos">NUESTRAS MARCAS Y MODELOS</h2>
  <div class="grid-marcas">
    <div v-for="marca in marcas" :key="marca.nombre">
      <img :src="marca.imagen" :alt="marca.nombre" />
    </div>
  </div>
</div>


  </section>
</template>

<script setup>
const categorias = [
  { nombre: 'Grúas', imagen: '/src/assets/gruas.jpg', link: { path: '/inventario', query: { categoria: 'Gruas' } } },
  { nombre: 'Maquinaria Pesada', imagen: '/src/assets/maquinariaPesada.jpg', link: { path: '/inventario', query: { categoria: 'Maquinaria Pesada' } } },
  { nombre: 'Equipos de Elevación', imagen: '/src/assets/equipoElevacion.jpg', link: { path: '/inventario', query: { categoria: 'Elevador' } } },
  { nombre: 'Camiones', imagen: '/src/assets/camiones.jpg', link: { path: '/inventario', query: { categoria: 'Camiones' } } },
]


const marcas = [
  { nombre: 'Caterpillar', imagen: '/src/assets/manitex.png' },
  { nombre: 'Komatsu', imagen: '/src/assets/cat.png' },
  { nombre: 'Volvo', imagen: '/src/assets/terex.png' },
  { nombre: 'John Deere', imagen: '/src/assets/hiab.png' },
  { nombre: 'Hitachi', imagen: '/src/assets/casec.png' },
  { nombre: 'Liebherr', imagen: '/src/assets/kenwork.png' },
  { nombre: 'Doosan', imagen: '/src/assets/national.png' },
  { nombre: 'Hyundai', imagen: '/src/assets/john.png' },
  { nombre: 'Case', imagen: '/src/assets/grove.png' },
  { nombre: 'JCB', imagen: '/src/assets/freigg.png' },
  { nombre: 'New Holland', imagen: '/src/assets/sterling.png' },
  { nombre: 'Bobcat', imagen: '/src/assets/wacker.png' },
]

import "./Styles/InicioStyle.css"
</script>


