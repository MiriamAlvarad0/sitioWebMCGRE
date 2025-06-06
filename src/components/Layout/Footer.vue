<template>
  <footer class="footer">
    <div class="footer-columns">
      <div class="footer-column">
        <h4 class="logoBlanco">
          <img src="/src/assets/mcgreeFooter.png" alt="Logo" style="max-width: 200px;  margin-top: -15px;" />
        </h4>
        <h1 class="txt1">Contamos con los equipos de las marcas más reconocidas a nivel mundial disponibles en nuestro
          inventario y con los mejores proveedores.</h1>
        <div class="redes-sociales">
          <a href="https://www.facebook.com/profile.php?id=61572911858579" target="_blank" rel="noopener" title="Facebook">
            <img src="/src/assets/facebook.png" alt="Facebook" class="logosRedes" />
          </a>
          <a href="https://www.instagram.com/mcgre.equipment/" target="_blank" rel="noopener" title="Instagram">
            <img src="/src/assets/instagram.png" alt="Instagram" class="logosRedes" />
          </a>
          <a href="https://wa.me/5215555555555" target="_blank" rel="noopener" title="WhatsApp">
            <img src="/src/assets/whatsapp.png" alt="WhatsApp" class="logosRedes" />
          </a>
          <a href="https://www.tiktok.com/@mcgre.equipment" target="_blank" rel="noopener" title="TikTok">
            <img src="/src/assets/tik-tok.png" alt="TikTok" class="logosRedes" />
          </a>
          <a href="https://www.linkedin.com" target="_blank" rel="noopener" title="LinkedIn">
            <img src="/src/assets/linkedin.png" alt="LinkedIn" class="logosRedes" />
          </a>
          <a href="https://www.youtube.com" target="_blank" rel="noopener" title="YouTube">
            <img src="/src/assets/youtube.png" alt="LinkedIn" class="logosRedes" />
          </a>
        </div>
      </div>
      <div class="footer-column">
        <h4>Navegación</h4>
        <ul class="footer-nav">
          <li><router-link to="/inicio">Inicio</router-link></li>
          <!-- Aquí está el cambio: limpiamos la query para que muestre todo -->
          <li><router-link to="/inventario">Inventario</router-link></li>
          <li><router-link to="/subasta">Subasta</router-link></li>
          <li><router-link to="/proveedor">Proveedor</router-link></li>
          <li><router-link to="/contacto">Contacto</router-link></li>
        </ul>
      </div>
      <div class="footer-column">
        <h4>Contacto</h4>
        <p><i class="fas fa-phone"></i> +52 (653) 849 9644</p>
        <p><i class="fas fa-phone"></i> +52 (653) 530 6955</p>
        <p><i class="fas fa-map-marker-alt"></i>Av. Madero y calle 34</p>
        <p><i class="fas fa-envelope"></i>contacto@ejemplo.com</p>
      </div>
    </div>
  </footer>
</template>
