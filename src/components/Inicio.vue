<template>
  <header>
    <div class="topbar">
      <div class="bannerinicio">
        <div class="textobanner">
          <h1>
            <span class="naranja">MCGREE EQUIPMENT</span> TU ALIADO
          </h1>
          <h1>EN MAQUINARIA PESADA</h1>
          <h1>CONFIABLE</h1>

          <router-link class="botonbanner" :to="{ path: '/inventario' }">
            Ver inventario
          </router-link>
        </div>
      </div>
    </div>
  </header>

  <!-- Sección de Categorías -->
  <section class="categorias">
    <h2 class="titulo-categorias">ELIGE LA CATEGORIA</h2>
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
  </section>
</template>

<script setup>
const categorias = [
  {
    nombre: 'Grúas',
    imagen: '/src/assets/gruas.jpg',
    link: '/gruas',
  },
  {
    nombre: 'Maquinaria Pesada',
    imagen: '/src/assets/maquinaria.jpg',
    link: '/maquinaria',
  },
  {
    nombre: 'Equipos de Elevación',
    imagen: '/src/assets/equipoElevacion.jpg',
    link: '/elevacion',
  },
  {
    nombre: 'Camiones',
    imagen: '/src/assets/camiones.jpg',
    link: '/camiones',
  },
]
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
  background-image: url('/src/assets/fondoinicio.jpeg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  display: flex;
  align-items: center;
  justify-content: flex-start;
  height: 70vh; /* se adapta a la altura del viewport */
  width: 100%;
  padding: 0 5%;
  position: relative;
}

/* Texto del banner */
.textobanner {
  color: white;
  z-index: 2;
  font-size: 2.9rem;
  font-weight: bold;
  max-width: 600px;
  margin-left: 70px;
}

/* Títulos responsivos */
.textobanner h1 {
  font-size: 4rem;
  margin: 0;
  white-space: nowrap; /* Evita salto de línea para que esté todo junto */
}

.naranja {
  color: #eb812f;
  font-weight: 700;
}

/* Botón */
.botonbanner {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 10px 20px;
  font-size: 2.5rem;
  cursor: pointer;
  border-radius: 4px;
  transition: background-color 0.3s ease;
  text-decoration: none;
  display: inline-block;
  margin-top: 40px;
}

.botonbanner:hover {
  background-color: #0056b3;
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
    white-space: normal; /* Permite saltos en móvil para que no se corte */
  }

  .botonbanner {
    font-size: 1.2rem;
    padding: 8px 16px;
  }
}

/* === ESTILOS CATEGORÍAS === */

.categorias {
  padding: 40px 20px;
  background-color: #f9f9f9;
  text-align: center;
}

.titulo-categorias {
  font-size: 2rem;
  margin-bottom: 30px;
  color: #212529;
}

.grid-categorias {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 20px;
}

.card-categoria {
  background-color: white;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  text-decoration: none;
  color: inherit;
  transition: transform 0.3s ease;
}

.card-categoria:hover {
  transform: translateY(-5px);
}

.card-categoria img {
  width: 100%;
  height: 160px;
  object-fit: cover;
  aspect-ratio: 4 / 3;
  object-fit: cover;
}

.card-categoria h3 {
  padding: 15px;
  font-size: 1.2rem;
  color: #eb812f;
}
</style>
