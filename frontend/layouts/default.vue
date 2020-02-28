<template>
  <v-app light>
    <div class='btn-menu'>
<v-menu class='pr-1' offset-y open-on-hover bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn class='btn-login custom-link pr-5 pl-5' v-on="on">
                                Opcões
                            </v-btn>
                        </template>

                        <v-list>
                            <nuxt-link to="/">
                                <v-list-item>
                                    <v-list-item-title class='grey--text'>Opcão 01</v-list-item-title>
                                </v-list-item>
                                <v-divider class='width-85 center'></v-divider>
                            </nuxt-link>
                            <nuxt-link to="/opcao02">
                                <v-list-item>
                                    <v-list-item-title class='grey--text'>Opcão 02</v-list-item-title>
                                </v-list-item>
                            </nuxt-link>
                        </v-list>
                    </v-menu>
    </div>    
    <nuxt />       
  </v-app>
</template>

<script>

export default {  
  
  }
</script>


<style>
.btn-menu {
  max-width: 100px;
  position: absolute;
  top: 2%;
  right: 5%;
}
.btn-login {
    font-family: var(--primary-font);
    text-transform: initial;
    font-weight: 700;
    border-radius: 100px;
    color: #038145!important;
    background-color: rgb(250, 250, 250) !important;
    border: 2px solid #038145!important;
}
</style>
