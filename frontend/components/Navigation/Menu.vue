<template>
  <v-toolbar light flat class='menu-default mt-4 flex-wrap'>
    <v-toolbar-title  >
      <nuxt-link  flat to="/">
        <img class='ml-5 logo-default'
        src="~/assets/imagens/logos/hospital_casa_de_saude_logo.png" alt='Loco Casa de Saúde Santos'>
      </nuxt-link>
    </v-toolbar-title>
    <v-spacer></v-spacer>
    <!-- Se não estiver autenticado -->
    <template v-if="!authenticated">
      <v-toolbar-items class="hidden-sm-and-down mr-4 default-font-regular">
    <ul>

      <li><nuxt-link class='pr-1' to="/">Home</nuxt-link></li>
      <li><nuxt-link class='pr-1' to="/servicos">Serviços</nuxt-link>
       <!-- <v-icon size=20 class='white--text'>arrow_drop_down</v-icon>
        <ul>
          <li><nuxt-link to="/servicos/pronto-atendimento" class='text-link'>Pronto Atendimento</nuxt-link></li>
          <li><nuxt-link to="/servicos/maternidade" class='text-link'>Maternidade</nuxt-link></li>
          <li><nuxt-link to="/servicos/unidade-avc" class='text-link'>Unidade AVC</nuxt-link></li>
          <li><nuxt-link to="/servicos/hemodinamica" class='text-link'>Hemodinâmica</nuxt-link></li>
          <li><nuxt-link to="/servicos/neurocirurgia" class='text-link'>Neurocirurgia</nuxt-link></li>
          <li><nuxt-link to="/servicos/utis" class='text-link'>UTIS</nuxt-link></li>
          <li><nuxt-link to="/servicos/cirurgias" class='text-link'>Cirurgias</nuxt-link></li>
          <li><nuxt-link to="/servicos/buco-maxilo-facial" class='text-link'>Buco maxilo Facial</nuxt-link></li>
          <li><nuxt-link to="/servicos/endoscopia" class='text-link'>Endoscopia</nuxt-link></li>
          <li><nuxt-link to="/servicos/analises-clinicas" class='text-link'>Análises Clínicas</nuxt-link></li>
          <li><nuxt-link to="/servicos/exames-de-imagens" class='text-link'>Exames de imagens</nuxt-link></li>
        </ul>
      </li> -->
       <li><nuxt-link class='pr-1' to="/trabalhe-conosco">Convênios</nuxt-link></li>
       <li><nuxt-link class='pr-1' to="/trabalhe-conosco">Trabalhe Conosco</nuxt-link></li>
      <li><nuxt-link class='pr-1' to="/pacientes-e-visitantes">Horário de visitas</nuxt-link>
       <!-- <v-icon size=20 class='white--text'>arrow_drop_down</v-icon>
        <ul>
          <li><nuxt-link to="/pacientes-e-visitantes/horario-de-visita" class='text-link'>Horário de visita</nuxt-link></li>
          <li><nuxt-link to="/pacientes-e-visitantes/convenios" class='text-link'>Convênios</nuxt-link></li>
        </ul>
      </li> -->
      <li><nuxt-link to="/contato" class='btn btn-custom-2 dark--text'>Contato</nuxt-link></li>
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
.flex-wrap {
  display: grid;
  align-items: center;
}
.online{
  font-size: 1rem;
}
.logo-default{
  padding-top: 18px;
}
.menu-default {
  display: grid;
  align-items: center;
  height: 72px;
  position: absolute;
  z-index: 99;
  background-color: transparent;
}
.nuxt-link, a {
  text-transform: uppercase;
  text-transform: none;
  text-decoration: none;
  font-size: 0.91rem;
  letter-spacing: 0.04em;
  color: rgba(90, 88, 88, 0.849);
  font-weight: 900;
}
li {
  list-style: none;
}
 ul {
  font-family: 'Lato', sans-serif;
  font-size: 0;
  list-style-type: none;
}
 ul li {
  font-size: 1rem;
  font-weight: 400;
  color: #959595de;
  display: inline-block;
  padding: 15px;
  position: relative;
  padding-left: 5px!important;
}
 ul li ul {
  display: none;
}
 ul li:hover {
  cursor: pointer;
   color: #111!important;
}
.text-link {
  color: rgb(82, 82, 82);
}
ul li:hover ul {
  display: block;
  left: 0;
  position: absolute;

}
ul li:hover ul li {
  display: block;
  background-color: #ffffff;
  color: rgb(58, 58, 58);
  visibility: visible;
	transition-delay: .1s;
  transition: .1s;
  line-height: 2px;
  font-size: 0.9rem;
}
ul li:hover ul li span {
  float: right;
  padding: 2px 5px;
  text-align: center;
  font-size: 0.8rem;
  border-radius: 3px;
  visibility: visible;
	transition-delay: .3s;
  transition: .3s;
}
.btn-custom-2{
  padding: 0.95em 2.3em;
  text-transform: none;
  border-radius: 30px;
}
.btn-custom-2{
    border-radius: 5px;
    background: transparent;
    font-size: 0.80rem!important;
    border: 2px solid rgb(238, 238, 238);
    color: rgb(238, 238, 238);
}
.btn-custom-2:hover{
    background: rgb(238, 238, 238);
    color: #111;
    transition-delay: .1s;
    transition-duration: .6s;
}
@media only screen and (max-width: 1370px) {
.nuxt-link, a {
  font-size: 1rem;
}
ul li {
  font-size: 1rem;
  padding: 10px;
  position: relative;
  padding-left: 5px!important;
}
 ul li ul {
  display: none;
}
.btn-custom-2 {
  padding: 0.92em 2em;
  text-transform: none;
  border-radius: 30px;
}
.btn-custom-2{
    border-radius: 5px;
    background: transparent;
    font-size: 0.69rem!important;
    border: 2px solid rgb(238, 238, 238);

  }
}
</style>
