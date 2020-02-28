<template>
<div class="sidenav-container">
  <div
    v-if="show"
    class="sidenav-backdrop"
    @click="$emit('close')"></div>
  <transition name="slide-side">
    <div
      v-if="show"
      class="sidenav">
      <ul
        class="nav-list"
        @click="$emit('close')">
      <li><nuxt-link class='pr-1 grey--text' to="/">Home</nuxt-link></li>
      <li><nuxt-link class='pr-1  grey--text' to="/quem-somos">Quem Somos</nuxt-link>
       <li><nuxt-link class='pr-1  grey--text' to="/faq">Faq</nuxt-link></li>
       <li><nuxt-link class='pr-1  grey--text' to="/contato">Contato</nuxt-link></li>
      <li>
             <!-- Registrar -->
      <v-menu class='pr-1' offset-y open-on-hover bottom>
      <template v-slot:activator="{ on }">
        <v-btn
          
          class='grey--text btn-login custom-link mt-2'
          v-on="on"          
        >
       Registrar
        </v-btn>
      </template>

      <v-list>
        <nuxt-link to="/profissional">
        <v-list-item>
          <v-list-item-title class='grey--text'>Profissional</v-list-item-title>
        </v-list-item>
        <v-divider class='width-85 center'></v-divider>
        </nuxt-link>
        <nuxt-link to="/empresa">
         <v-list-item>
          <v-list-item-title class='grey--text'>Empresa</v-list-item-title>
        </v-list-item>
        </nuxt-link>
      </v-list>
    </v-menu>
      </li>
      <li>
              <!-- Login -->
      <v-menu offset-y open-on-hover>
      <template v-slot:activator="{ on }">
        <v-btn
          tile
          dark
          v-on="on"
          class='mt-2'
          style="background: var(--secondary-color);"
          
        >
          Login
        </v-btn>
      </template>

      <v-list>
        <nuxt-link to="/profissional">
        <v-list-item>
          <v-list-item-title class='grey--text'>Profissional</v-list-item-title>
        </v-list-item>
        </nuxt-link>
        <v-divider class='width-85 center'></v-divider>
        <nuxt-link to="/empresa">
         <v-list-item>
          <v-list-item-title class='grey--text'>Empresa</v-list-item-title>
        </v-list-item>
        </nuxt-link>
      </v-list>
    </v-menu>
      </li>
      </ul>
    </div>
  </transition>
</div>
</template>

<script>
export default {
  name: "TheSidenav",
  props: {
    show: {
      type: Boolean,
      default: false
    }
  }
};
</script>


<style scoped>
.sidenav-container {
  height: 100%;
  width: 100%;
}
.sidenav-backdrop {
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.7);
  z-index: 1000;
  position: fixed;
  top: 0;
  left: 0;
}
.sidenav {
  height: 100%;
  width: 260px;
  background-color: white;
  z-index: 10000;
  position: fixed;
  top: 0;
  left: 0;
  box-sizing: border-box;
  padding: 30px;
}
.slide-side-enter-active,
.slide-side-leave-active {
  transition: all 0.3s ease-out;
}
.slide-side-enter,
.slide-side-leave-to {
  transform: translateX(-100%);
}
.nav-list {
  list-style: none;
  padding: 0;
  margin: 0;
}
.nav-item {
  margin: 20px 0;
}
.application a {
  text-decoration: none;
  color: var(--color-1);
  font-size: 1.4rem;
  line-height: 1.8;
  font-family: 'Lato', sans-serif;
  font-weight: 400;
}
.application a:hover {
  text-decoration: none;
  color: var(--color-3);

  font-family: 'Lato', sans-serif;
}
.btn-custom {
  padding: 0.95em 2.3em;
  text-transform: none;
  border-radius: 30px;
   font-size: 2rem!important;
}
.btn-custom{

    border-radius: 5px;
    background: transparent;
    font-size: 0.80rem!important;
    border: 2px solid var(--color-1);
    color: rgb(238, 238, 238);
}
.btn-custom:hover{
    background: var(--color-1);
    color: #fff!important;
    transition-delay: .1s;
     transition-duration: .6s;
}

.nav-item a:hover,
.nav-item a:active {
  color: var(--default-color);
}
</style>
