<template>
  <section class="body">
    <div>
      <b-card overlay class="inventarioBanner" img-alt="Card Image" text-variant="white" title="Image Overlay"
        sub-title="Subtitle">
        <b-card-text>
          <h1 class="textobanner">| CONTÁCTANOS </h1>
        </b-card-text>
      </b-card>
    </div>

    <section class="contacto">
      <div class="contacto-header">
        <p>Nuestro equipo está listo para ayudarte a encontrar</p>
        <p>la mejor solución.</p>
      </div>

      <div class="contenido-contacto">
        <!-- Formulario -->
        <form @submit.prevent="handleSubmit" class="formulario">
          <h3>ENVÍA TU MENSAJE</h3>

          <!-- Nombre y Teléfono en la misma fila -->
          <div class="campos-dobles">
            <div class="campo">
              <label for="nombre">Nombre</label>
              <input v-model="form.nombre" type="text" id="nombre" required />
            </div>
            <div class="campo">
              <label for="telefono">Teléfono</label>
              <input v-model="form.telefono" type="tel" id="telefono" required />
            </div>
          </div>

          <!-- Correo -->
          <div class="campo">
            <label for="correo">Correo</label>
            <input v-model="form.correo" type="email" id="correo" required />
          </div>

          <!-- Mensaje -->
          <div class="campo">
            <label for="mensaje">Mensaje</label>
            <textarea v-model="form.mensaje" id="mensaje" maxlength="200" required></textarea>
          </div>

          <button type="submit" class="boton">Enviar Mensaje</button>
        </form>

        <!-- Mapa + Datos -->
        <b-card class="card-info-horizontal p-0" no-body>
          <div class="card-horizontal-content">
            <div class="mapa-card">
              <iframe
                src="https://www.google.com/maps/embed?pb=!4v1748881166108!6m8!1m7!1swsTWT1y7upreYKixnGT0Vw!2m2!1d32.46964157162209!2d-114.7390987271373!3f68.12!4f-2.5600000000000023!5f0.7820865974627469"
                width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <b-card-body class="datos-card datos-contacto">
              <div class="d-flex align-items-start mb-3 item-contacto">
                <span class="me-3" style="color: #1998d4;">
                  <i class="fas fa-map-marker-alt fa-lg"></i>
                </span>
                <div class="texto-contacto">
                  <p class="info mb-0">Av. Madero y calle 34, San Luis Río Colorado, Son.</p>
                </div>
              </div>

              <div class="d-flex align-items-start mb-3 item-contacto">
                <span class="me-3 invisible">
                  <i class="fas fa-clock fa-lg"></i>
                </span>
                <div class="texto-contacto">
                  <p class="info mb-0">Lunes a viernes de 8 AM a 4 PM</p>
                </div>
              </div>

              <div class="d-flex align-items-start mb-3 item-contacto">
                <span class="me-3" style="color: #1998d4;">
                  <i class="fas fa-phone-alt fa-lg"></i>
                </span>
                <div class="texto-contacto">
                  <p class="label fw-bold text-muted mb-0">Llámanos</p>
                  <p class="info mb-0">+52 (653) 849 9644</p>
                </div>
              </div>

              <div class="d-flex align-items-start mb-3 item-contacto">
                <span class="me-3" style="color: #1998d4;">
                  <i class="me-4"></i>
                </span>
                <div class="texto-contacto">
                  <p class="label fw-bold text-muted mb-0">WhatsApp</p>
                  <p class="info mb-0">+52 (653) 530 6955</p>
                </div>
              </div>

            </b-card-body>
          </div>
        </b-card>
      </div>

      <div class="hashtag">#MaquinariaDeCalidadProgresandoContigo</div>
    </section>
  </section>
</template>

<script setup>
import { reactive } from 'vue'
import emailjs from 'emailjs-com'
import "./Styles/ContactoStyle.css"

const form = reactive({
  nombre: '',
  telefono: '',
  correo: '',
  mensaje: '',
})

function handleSubmit() {
  if (form.mensaje.length > 200) {
    alert('El mensaje debe tener máximo 200 caracteres.')
    return
  }

  const serviceID = 'service_kpbrb4c'
  const templateID = 'template_4ykhxmk'
  const userID = 'hBl4ZzeK2eHooZk7E'
  const templateParams = { ...form }

  emailjs.send(serviceID, templateID, templateParams, userID)
    .then(() => {
      alert('Correo enviado correctamente')
      form.nombre = ''
      form.telefono = ''
      form.correo = ''
      form.mensaje = ''
    }, (error) => {
      alert('Error al enviar el correo: ' + error.text)
    })
}
</script>
