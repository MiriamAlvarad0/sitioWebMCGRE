<template>
  <Header />
  <Navbar />

  <!-- Contenedor general corregido -->
  <div class="layout-container">
    <main>
      <section>
        <div>
          <div>
            <h5></h5>
            <router-view></router-view>
            <p></p>
          </div>
        </div>  
      </section>
    </main>
  </div>

  <Footer /> 
</template>

<script setup>
import Header from './components/Layout/Header.vue'
import Navbar from './components/Layout/Navbar.vue'
/* import Footer from './components/Layout/Footer.vue' */
</script>

<style>
/* Estilos globales para prevenir desbordamiento y asegurar adaptación */
* {
  box-sizing: border-box;
}

/* html, body { */
/*   margin: 0; */
/*   padding: 0; */
/*   width: 100%; */
/*   overflow-x: hidden;  */
/* } */

/* Contenedor principal para todo el layout */
.layout-container {
  max-width: 100%;
  width: 100%;
  overflow-x: hidden;
  padding: 0;
  margin: 0 auto;
}

/* main, section, div { */
/*   max-width: 100%; */
/*   width: 100%; */
/* } */
</style>
