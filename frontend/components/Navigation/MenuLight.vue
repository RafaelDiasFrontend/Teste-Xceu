<template>
  <v-toolbar light flat class='menu-default mt-4 flex-wrap'>
    <v-toolbar-title  >
      <nuxt-link  flat to="/">
        <img class='ml-5 logo-default'
        src="~/assets/imagens/logos/hospital_casa_de_saude_logo_light.png" alt='Loco Casa de Saúde Santos'>
      </nuxt-link>
    </v-toolbar-title>
    <v-spacer></v-spacer>
    <!-- Se não estiver autenticado -->
    <template v-if="!authenticated">
      <v-toolbar-items class="hidden-sm-and-down mr-4 default-font-regular">
    <ul>
      <li><nuxt-link to="/">Home</nuxt-link></li>
      <li><nuxt-link to="/servicos">Serviços</nuxt-link>
      <li><nuxt-link to="/trabalhe-conosco">Especialidades</nuxt-link></li>
      <li><nuxt-link to="/pacientes-e-visitantes">Visitantes</nuxt-link>
      <li><nuxt-link to="/contato" class='text-link btn btn-custom'>Contato</nuxt-link></li>
       <!-- <li><RegisterModal /></li> -->
    </ul>
    <div class="information">
    </div>
      </v-toolbar-items>
    </template>

    <!-- Se ele estiver mostre -->
    <template v-if="authenticated">
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn flat><v-icon color="green" class='online pr-1'>fiber_manual_record</v-icon><a flat>{{user.name}}</a></v-btn>
        <v-btn @click.prevent='logout' flat><v-icon class='pr-1'>logout</v-icon><a @click.prevent='logout'>Sair</a></v-btn>
      </v-toolbar-items>
    </template>
  </v-toolbar>
</template>

<script>
import RegisterModal from '@/components/Forms/RegisterModal'
export default {
  middleware: ['auth'],
  components: { RegisterModal },
  data: () => ({
      items: [
        { title: 'Click Me' },
        { title: 'Click Me' },
        { title: 'Click Me' },
        { title: 'Click Me 2' }
      ]
    }),
  methods: {
    logout() {
      this.$auth.logout()
    }
  }
}
</script>

<style scoped>
.logo-default {
    max-width: 207px;
    height: auto;
}
.flex-wrap {
  display: grid;
  align-items: center;
}
.online{
  font-size: 1.1rem;
}
.menu-default {
  padding-top: 0.76em;
  position: absolute;
  z-index: 99;
  background-color: transparent;

}
.nuxt-link, a {
  text-transform: uppercase;
  text-transform: none;
  text-decoration: none;
  font-size: 0.96rem;
  letter-spacing: 0.04em;
  color: #838383;
}
.nuxt-link, a:hover {
  color: var(--default-color);
}
li {
  list-style: none;
}
 ul {
  font-size: 0;
  list-style-type: none;
}
 ul li {
  font-size: 1rem;
  font-weight: 400;
   color: #252525;
  display: inline-block;
  padding: 17px;
  position: relative;
  padding-left: 5px!important;
}
 ul li ul {
  display: none;
}
.text-link {
  color: rgb(82, 82, 82);
}
ul li:hover ul {
  display: block;
  margin-top: 15px;
  width: 200px;
  left: 0;
  position: absolute;

}
ul li:hover ul li {
  display: block;
  background-color: #fdfdfdfd;
  color: rgb(58, 58, 58);
  visibility: visible;
	transition-delay: .1s;
  transition: .1s;
  line-height: 2px;
  font-size: 0.9rem;
}
ul li:hover ul li span {
  float: right;
  color: #252525;
  padding: 2px 5px;
  text-align: center;
  font-size: 0.8rem;
  border-radius: 3px;
  visibility: visible;
	transition-delay: .3s;
  transition: .3s;
}
 ul li:hover ul li:hover {
  background-color: var(--default-color);
}
.btn-custom {
  padding: 0.95em 2.3em;
  text-transform: none;
  border-radius: 30px;
}
.btn-custom{
    border-radius: 5px;
    background: transparent;
    font-size: 0.80rem!important;
    border: 2px solid var(--default-color);
    color: var(--default-color);

}
.btn-custom:hover{
    border-radius: 5px;
    background: var(--default-color);
    color: #fff;
    transition-delay: .1s;
     transition-duration: .6s;
}
@media only screen and (max-width: 1370px) {
.nuxt-link, a {
  font-size: 0.89rem;
}
ul li {
  font-size: 0.9rem;
  padding: 14px;
  position: relative;
  padding-left: 5px!important;
}
 ul li ul {
  display: none;
}
.btn-custom {
  padding: 0.92em 2em;
  text-transform: none;
  border-radius: 30px;
}
.btn-custom{
    border-radius: 5px;
    font-size: 0.69rem!important;

}


}



</style>
