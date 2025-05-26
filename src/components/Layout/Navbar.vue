<template>

  <!-- NAVBAR PRINCIPAL -->
  <nav class="navbar navbar-expand-lg bg-light sticky-top">
    <div class="container-fluid navbar-content">
      <!-- LOGO -->
      <router-link class="navbar-brand" :to="{ path: '/inicio' }">
        <img src="/src/assets/logoTest.png" alt="Logo principal" class="logo" />
      </router-link>

      <!-- BOTÓN RESPONSIVE -->
      <button 
        class="navbar-toggler" 
        type="button"
        data-bs-toggle="collapse" 
        data-bs-target="#navbarNav" 
        aria-controls="navbarNav" 
        aria-expanded="false" 
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- MENÚ DE NAVEGACIÓN -->
      <div class="collapse navbar-collapse menu-container" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <router-link class="nav-link custom-link" :to="{ path: '/inicio' }">Inicio</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link custom-link" :to="{ path: '/inventario' }">Inventario</router-link>
          </li>

          <!-- SERVICIOS CON DESPLEGABLE -->
          <li class="nav-item dropdown">
            <a 
              class="nav-link dropdown-toggle custom-link" 
              href="#" 
              id="navbarDropdown" 
              role="button" 
              data-bs-toggle="dropdown" 
              aria-expanded="false"
            >
              Servicios
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <router-link class="dropdown-item" :to="{ path: '/subasta' }">Subasta</router-link>
              </li>
              <li>
                <router-link class="dropdown-item" :to="{ path: '/proveedor' }">Proveedor</router-link>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <router-link class="nav-link custom-link" :to="{ path: '/acercade' }">Acerca de</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link custom-link" :to="{ path: '/contacto' }">Contacto</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<style scoped>
.logo {
  max-height: 80px;
  margin-left: 70px;
}

.menu-container {
  justify-content: center;
}

.navbar-nav {
  display: flex;
  gap: 100px; /* aumenté el gap para más separación */
  padding: 0;
  margin: 0 auto;
  list-style: none;
}
@media (max-width: 991px) {
  .navbar-nav {
    gap: 15px; /* menos separación en móvil para que no quede muy amplio */
  }
}

.custom-link {
  font-size: 1.1rem;
  color: #050505 !important;
  font-weight: 500;
  transition: color 0.3s ease;
}

.custom-link:hover {
  color: #6cc7ee !important;
}
</style>
