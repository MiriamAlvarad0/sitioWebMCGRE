<template>
  <div class="app-wrapper">
    <Header />
    <Navbar />

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
 <ScrollToTop />
    <Footer />
  </div>
</template>

<script setup>
import '@fortawesome/fontawesome-free/css/all.min.css'
import ScrollToTop from './components/ScrollToTop.vue'
import Header from './components/Layout/Header.vue'
import Navbar from './components/Layout/Navbar.vue'
import Footer from './components/Layout/Footer.vue'

import './components/Styles/AppStyle.css'
import '../src/components/Styles/FooterStyle.css'



</script>
