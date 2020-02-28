<template>
    <nav class='admin-nav'>
        <v-toolbar class='flex-custom' flat app>
            <v-toolbar-side-icon class="grey--text" @click="drawer = !drawer"></v-toolbar-side-icon>
            <v-toolbar-title class='logo text-uppercase grey--text'>
               <img class='logo-default' src="~/assets/imagens/logos/css_logo_default.png" alt='Loco Casa de Saúde Santos'>


            </v-toolbar-title>
            <v-spacer></v-spacer>

            <!-- Online Status -->
            <v-btn flat>
                <v-icon color="green" class='online pr-1'>fiber_manual_record</v-icon>
                <span class='online-text'>{{user.name}}</span>
            </v-btn>

            <!-- Sair -->
            <v-btn @click.prevent='logout' flat>
                <v-icon class='pr-1'>logout</v-icon>
                <a  @click.prevent='logout'>Sair</a>
            </v-btn>

        </v-toolbar>

        <v-navigation-drawer light app v-model="drawer" class='white'>
            <center><v-avatar size='80' class='mt-4 avatar-perfil' color="grey">
             <v-icon dark size='70' >account_circle</v-icon>
             </v-avatar></center>
            <p class='nome-perfil grey--text pt-3 perfil-nome text-xs-center'>{{user.name}}</p>


            <!-- For pra gerar os icones textos e links do menu  -->
             <v-list>
                <v-list-tile  v-for="link in links" :key="link.title" router :to="link.route">
                    <v-list-tile-action>
                        <v-icon class='menu-color'>{{link.icon}}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title class="menu-color">{{link.title}}</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>

            </v-list>
        </v-navigation-drawer>

    </nav>
</template>


<script>
export default {
 layout: 'admin',
 data() {
     return {
         drawer: true,
         links: [
             { icon: 'dashboard', title: 'Painel', route: '/painel-de-controle' },
             { icon: 'timeline', title: 'Posts', route: '/topics' },
             { icon: 'add_box', title: 'Publicar', route: '/publicar' },
             { icon: 'bar_chart', title: 'Relatorios', route: '/relatorios' },
             { icon: 'account_circle', title: 'Perfil', route: '/perfil' },
             { icon: 'local_dining', title: 'Cardapio', route: '/cardapio' },
             { icon: 'events', title: 'Eventos', route: '/eventos' },
             { icon: 'face', title: 'Colaboradores', route: '/colaboradores' },
             { icon: 'monetization_on', title: 'Premios', route: '/premios' },
             { icon: 'assignment', title: 'FAQ', route: '/faq' },
            //  { icon: 'launch', title: 'Visualizar Perfil', route: '/perfil-user' }


                 ]
         }
     },
 methods: {
    logout() {
      this.$auth.logout()
    },

  }
}
</script>


<style scoped>


.logo-default {
    max-width: 8em;
    height: auto;
    margin-top: 19px;
}
.avatar-perfil{
    margin-top: 0.8em;
}
.online{
  font-size: 1rem;
}
.online-text {

    text-transform: initial;
}
.perfil-nome {
    font-size: 1.1rem;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: 0.039em;
}
.menu-color {
 color:rgba(68, 68, 68, 0.932);
}


</style>
