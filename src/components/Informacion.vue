<template>
    <!-- Banner -->
    <section class="body">
        <div>
            <b-card overlay class="bannerinicio" img-alt="Card Image" text-variant="white" title="Image Overlay"
                sub-title="Subtitle">
                <b-card-text>
                    <h1 class="textobanner">| Grua </h1>
                </b-card-text>
            </b-card>
        </div>
        <!-- Detalles -->

        <div class="container-detalle">
            <!-- Encabezado -->
            <div class="detalle-header">
                <img class="imagen-maquinaria" :src="maquinaria.imagen || '/src/assets/no-image.jpg'"
                    alt="Imagen Maquinaria" />

                <div class="info-maquinaria">
                    <h2 class="titulo">{{ maquinaria.nombre || 'Sin nombre' }}</h2>
                    <p class="subcategoria">{{ maquinaria.subcategoria || 'Sin subcategoría' }}</p>
                    <p class="precio">{{ maquinaria.precio && maquinaria.precio.trim() !== '' ? maquinaria.precio :
                        'Llamar para preguntar precio' }}</p>

                    <div class="botones">
                        <a :href="maquinaria.telefono" class="btn btn-llamar">
                            <i class="fas fa-phone-alt" style="margin-right: 8px;"></i>Llamar
                        </a>
                        <a :href="maquinaria.linkCotizar" class="btn btn-cotizar">
                            <i class="fas fa-comment-dots" style="margin-right: 8px;"></i>Cotizar
                        </a>
                    </div>
                </div>
            </div>

            <!-- Detalles generales -->
            <div class="detalle-general">
                <h4>General</h4>
                <table class="tabla-detalle">
                    <tr v-for="(valor, clave) in maquinaria.detalles" :key="clave">
                        <td class="clave">{{ clave }}</td>
                        <td class="valor">{{ valor }}</td>
                    </tr>
                </table>
            </div>

            <!-- Sección de orientación personalizada -->
            <div class="seccion-orientacion">
                <p class="texto-orientacion">
                    Si no encontraste exactamente lo que estabas buscando, no te preocupes.
                    Puedes comunicarte con uno de nuestros asesores especializados, quienes estarán
                    encantados de ayudarte a encontrar el equipo que mejor se adapte a tus necesidades.
                    Estamos aquí para guiarte durante todo el proceso, desde la elección del equipo ideal
                    hasta su entrega. Nuestro equipo está preparado para resolver tus dudas y ofrecerte
                    la orientación necesaria para que tomes la mejor decisión.
                </p>

                <!-- <a href="#mas-opciones" class="btn-ver-opciones">Ver más opciones</a> -->
                <router-link href="#mas-opciones" class="btn-ver-opciones" :to="{ path: '/proveedor' }">Ver más
                    opciones</router-link>
                <!-- <router-link class="botonbanner" :to="{ path: '/inventario' }"> Ver inventario </router-link> -->
            </div>
        </div>
    </section>
</template>

<script setup>
import { useRoute } from 'vue-router';

const route = useRoute();

let maquinaria = route.state?.maquinaria;

if (!maquinaria) {
    const guardada = localStorage.getItem('maquinariaSeleccionada');
    if (guardada) {
        maquinaria = JSON.parse(guardada);
    }
}

if (!maquinaria) {
    maquinaria = {
        imagen: '/src/assets/.jpeg',
        titulo: 'Sin información',
        subcategoria: '',
        precio: '',
        telefono: '',
        linkCotizar: '',
        detalles: {}
    };
}
</script>


<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.body {
    background-color: #f8f9fa;
}

.container-detalle {
    max-width: 1000px;
    margin: auto;
    padding: 1rem;
    margin-top: 40px;
}

.bannerinicio {
    background-image: url('/src/assets/inventarioBanner.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    height: 40vh;
    width: 100%;
    padding: 0 5%;
    position: relative;
}

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

.textobanner h1 {
    font-size: 4rem;
    margin: 0;
    white-space: nowrap;
}

.detalle-header {
    display: flex;
    flex-wrap: wrap;
    gap: 2.8rem;
    align-items: flex-start;
    margin-bottom: 2rem;
}

.imagen-maquinaria {
    width: 100%;
    max-width: 250px;
    border-radius: 8px;
    object-fit: cover;
}

.info-maquinaria {
    flex: 1;
    min-width: 250px;
}

.titulo {
    font-size: 1.8rem;
    font-weight: 800;
    margin-bottom: 0.3rem;
    text-transform: uppercase;
}

.subcategoria {
    color: #666;
    font-size: 1.5rem;
    margin-bottom: 0.8rem;
}

.precio {
    color: #ea5324;
    font-weight: bold;
    font-size: 1.7rem;
    margin-bottom: 1rem;
}

.botones {
    display: flex;
    flex-wrap: wrap;
    gap: 0.8rem;
}

/* Botones con hover en azul oscuro y naranja oscuro */
.btn {
    padding: 0.5rem 1.2rem;
    border-radius: 8px;
    color: white;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.3s ease;
}

.btn-llamar {
    background-color: #1793d1;
    /* Azul */
    font-size: 1.2rem;
    padding: 8px 80px;
    border-radius: 9px;
    margin-top: 15px;
}

.btn-llamar:hover {
    background-color: #1182ca;
    /* Azul oscuro */
    color: white;
}

.btn-cotizar {
    background-color: #fca311;
    /* Naranja */
    font-size: 1.2rem;
    padding: 8px 80px;
    border-radius: 9px;
    margin-top: 15px;
}

.btn-cotizar:hover {
    background-color: #f58109;
    /* Naranja oscuro */
    color: white;
}

.detalle-general h4 {
    font-weight: bold;
    margin-bottom: 1rem;
}

.tabla-detalle {
    width: 100%;
    border-collapse: collapse;
}

.tabla-detalle td {
    padding: 0.6rem 0.8rem;
    border-bottom: 1px solid #ddd;
}

.clave {
    font-weight: 600;
    color: #333;
    width: 40%;
}

.valor {
    color: #444;
}

/* Nueva sección: orientación personalizada */
.seccion-orientacion {
    margin-top: 3rem;
    padding: 1.5rem;
    text-align: center;
    border-radius: 12px;
}

.texto-orientacion {
    font-size: 1rem;
    line-height: 1.7;
    color: #333;
    text-align: justify;
    margin-bottom: 1.5rem;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}

.btn-ver-opciones {
    background-color: #1793d1;
    color: white;
    font-weight: 600;
    padding: 10px 30px;
    border-radius: 8px;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.3s ease;
}

.btn-ver-opciones:hover {
    background-color: #0f6ba2;
}

/* Responsive */
@media (max-width: 768px) {
    .detalle-header {
        flex-direction: column;
        align-items: center;
    }

    .info-maquinaria {
        text-align: center;
    }

    .botones {
        justify-content: center;
    }

    .tabla-detalle td {
        padding: 0.4rem 0.6rem;
    }
}
</style>