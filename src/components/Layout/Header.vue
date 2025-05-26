<template>
  <header>
    <!-- BARRA NEGRA COMPLETA ARRIBA -->
    <div class="topbar">
      <!-- Redes sociales (izquierda) -->
      <div class="redes-sociales">
        <a href="https://www.facebook.com" target="_blank" rel="noopener" title="Facebook">
          <img src="/src/assets/facebook.png" alt="Facebook" class="logosRedes" />
        </a>
        <a href="https://www.instagram.com" target="_blank" rel="noopener" title="Instagram">
          <img src="/src/assets/instagram.png" alt="Instagram" class="logosRedes" />
        </a>
        <a href="https://wa.me/5215555555555" target="_blank" rel="noopener" title="WhatsApp">
          <img src="/src/assets/whatsapp.png" alt="WhatsApp" class="logosRedes" />
        </a>
        <a href="https://www.tiktok.com" target="_blank" rel="noopener" title="TikTok">
          <img src="/src/assets/tik-tok.png" alt="TikTok" class="logosRedes" />
        </a>
        <a href="https://www.linkedin.com" target="_blank" rel="noopener" title="LinkedIn">
          <img src="/src/assets/linkedin.png" alt="LinkedIn" class="logosRedes" />
        </a>
      </div>

      <!-- Atención al cliente (derecha) -->
      <div class="cliente">
         <span class="numero">+52 (653) 530 6955 </span>
        <span>
       <img src="/src/assets/ubicacion.png" alt="Ubicación" class="icono" />
             Av. Madero y calle 34 #3400
      </span>

      </div>
    </div>
  </header>
</template>

<style scoped>
* {
  font-family: 'Poppins', sans-serif;
}
.topbar {
  background-color: #212529;
  display: flex;
  align-items: center;
  justify-content: space-between;
  box-sizing: border-box;
  padding: 10px 20px;
  color: white;
  flex-wrap: wrap;
}

.icono {
  width: 16px;
  height: 16px;
  vertical-align: middle;
  filter: brightness(0) invert(1);
}

.redes-sociales {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
  font-size: 1rem;
  margin: 10px 0;
  margin-left: 70px;
}
 
.cliente {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  font-size: 0.95rem;
  line-height: 1.3;
  margin: 10px 0;
}

.logosRedes {
  max-height: 24px;
  filter: brightness(0) invert(1);
  cursor: pointer;
  transition: transform 0.2s ease;

}

.logo2:hover {
  transform: scale(1.1);
}

.numero{
   font-weight: 800; /* Negrita */
}

/* === Media Query para pantallas menores a 768px (tablets y celulares) === */
@media (max-width: 768px) {
  .topbar {
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 15px 10px;
  }

  .redes-sociales {
    justify-content: center;
    margin: 10px 0;
  }

  .cliente {
    align-items: center;
  }
}
</style>













































