<template>
<section id='seja-um-franqueado'>
<v-container>
    <v-row class='df-width pt-1'>
        <v-col cols='12' lg='6' md='12' class='d-flex align-center'>
            <v-container class='box-01'>
                <h1 class='custom-title text-left text-uppercase'>Seja um <br><strong class='text-bold'>Franqueado</strong></h1>
                <p class='custom-subtitle pt-3'>Compre uma marca de sucesso com<br> baixo investimento e retorno garantido!</p>
                <ul class='social-midia-contact pa-0 pt-5'>                  
                    <li class='d-flex align-center py-3'>
                        <img src='~/assets/imagens/icons/phone-icon_dark.png' alt="icon_facebook" height="25px" width="auto" class='mr-3'>
                        <span class='span-text'>+55 (21) 2442-3443</span>                         
                    </li>
                    <li class='d-flex align-center py-3'>
                        <img src='~/assets/imagens/icons/email-icon_dark.png' alt="icon_facebook" height="25px" width="auto" class='mr-3'>
                        <span class='span-text'>franquia@grupoastral.com.br</span>                         
                    </li>                  
                    <li class='d-flex align-center py-3'>
                        <img src='~/assets/imagens/icons/facebook-logo_dark.png' alt="icon_facebook" height="25px" width="auto" class='mr-3'>
                        <span class='span-text'>facebook.com/astralsaudeambiental</span>                         
                        </li>
                    <li class='d-flex align-center py-3'>
                        <img src='~/assets/imagens/icons/instagram-logo_dark.png' alt="icon_facebook" height="25px" width="auto" class='mr-3'>
                        <span class='span-text'>instagram.com/grupoastral</span>                         
                    </li> 
                    <li class='d-flex align-center py-3'>
                        <img src='~/assets/imagens/icons/linkedin-logo_dark.png' alt="icon_facebook" height="25px" width="auto" class='mr-3'>
                        <span class='span-text'>Linkedin.com/company/astral-sa-de-ambiental</span>                         
                    </li>                  
                </ul>     
               <vue-recaptcha 
                class='pt-9'
                sitekey="6Lc2AN0UAAAAAA0_3S-LijRrpD0M1K91wXB3SMKJ"
                @verify="onCaptchaVerified"
                @expired="onCaptchaExpired"
               ></vue-recaptcha>
            </v-container>
        </v-col>
        <v-col cols='12' lg='6' md='12'>
            <v-container class='box-02'>
                <v-form 
                dark
                ref="form" 
                v-model="valid"
                lazy-validationaction 
                class='register-form pt-6 '
                @submit.prevent="registerFormTest"                
                >
                    <v-row class='d-flex'>
                        <v-col cols="12" xs="12" sm='6' md='6' lg="6" class='py-form'>
                            <!-- NAME -->
                            <span class='span-label'>Primeiro nome</span>
                            <v-text-field 
                            v-model="form.first_name"                             
                            placeholder="Primeiro Nome"                                                                                                                                   
                            required
                            dense
                            >
                            </v-text-field>
                        </v-col>
                             <v-col cols="12" xs="12" sm='6' md='6' lg="6" class='py-form'>
                            <!-- LASTNAME -->
                            <span class='span-label'>Sobrenome</span>
                            <v-text-field 
                            v-model="form.last_name"                             
                            placeholder="Sobrenome"                                                                                                                            
                            required
                            dense
                            >
                            </v-text-field>
                        </v-col>
                        <!-- Email -->
                        <v-col cols="12" xs="12" sm='6' md='6' lg="6" class='py-form'>
                            <span class='span-label'>Email</span>
                            <v-text-field 
                            placeholder="Email"                                                 
                            v-model="form.email" 
                            :rules="emailRules" 
                            required
                            dense>
                            </v-text-field>
                        </v-col>
                        <!-- CELPHONE -->
                        <v-col cols="12" xs="12" sm='6' md='6' lg="6" class='py-form'>
                            <span class='span-label'>Celular</span>
                            <v-text-field 
                            placeholder="(XX) XXXXX-XXXX"                           
                            v-mask="celphoneMask"                        
                            v-model="form.phone"                            
                            required
                            dense
                            >
                            </v-text-field>
                        </v-col> 
                         <!-- Cidade -->
                        <v-col cols="12" xs="12" sm='6' md='12' lg="6" class='py-form'>
                          <span class='span-label'>Cidade</span>
                            <v-text-field
                             v-model="form.city" 
                             label="Cidade"                            
                             required
                             dense
                             >
                             </v-text-field>
                        </v-col>    
                         <!-- STATE -->                         
                        <v-col cols="12" xs="12" sm='6' md='12' lg="6" class='py-form'>
                        <span class='span-label'>Estado</span>
                           <v-select 
                            label="Estado" 
                            :items="stateItems" 
                            v-model="form.state" 
                            max-height="auto" 
                            autocomplete                           
                            class='pa-0 py-0'
                            required
                            dense>
                        </v-select>
                        </v-col>
                         <!-- wanted city -->
                           <v-col cols="12" xs="12" sm='6' md='12' lg="12" class='py-form'>
                          <span class='span-label'>Cidade de interesse</span>
                            <v-text-field
                             v-model="form.interested_city" 
                             placeholder="Cidade de interesse"                             
                             required
                             dense
                             >
                             </v-text-field>
                        </v-col> 
                        <!-- TIME LEARN -->                         
                        <v-col cols="12" xs="12" sm='6' md='12' lg="12" class='py-form'>
                        <span class='span-label'>Quando quer empreender</span>
                           <v-select 
                            label="Selecione um valor" 
                            :items="time_learnItems" 
                            v-model="form.time_learn" 
                            max-height="auto" 
                            autocomplete                                                 
                            required
                            dense>
                        </v-select>
                        </v-col>
                          <!-- TIME LEARN -->                         
                        <v-col cols="12" xs="12" sm='6' md='12' lg="12" class='py-form'>
                        <span class='span-label'>Valor do Investimento?</span>
                           <v-select 
                            label="Selecione um valor" 
                            :items="investment_valueItems" 
                            v-model="form.investment_value" 
                            max-height="auto" 
                            autocomplete                                      
                            required
                            dense>
                        </v-select>
                        </v-col>
                               <!-- TIME LEARN -->                         
                        <v-col cols="12" xs="12" sm='6' md='12' lg="12" class='py-form'>
                        <span class='span-label'>Como nos conheceu?</span>
                           <v-select 
                            label="Selecione" 
                            :items="how_knowItems" 
                            v-model="form.how_know" 
                            max-height="auto" 
                            autocomplete                                                  
                            required
                            dense>
                        </v-select>
                        </v-col>
                       <!-- Ocupation-->                         
                        <v-col cols="12" xs="12" sm='12' md='12' lg="12" class='py-form'>
                        <span class='span-label'>Sua Ocupação?</span>
                           <v-select 
                            label="Selecione" 
                            :items="ocupationItems" 
                            v-model="form.ocupation" 
                            max-height="auto" 
                            autocomplete                                          
                            required
                            dense>
                        </v-select>
                        </v-col>
                        <!-- Como nos conheceu -->
                        <v-col cols="12" xs="12" sm='12' md='12' lg="12" class='py-form'>                          
                                <v-textarea 
                                outlined 
                                class='pa-0 py-0' 
                                name="input-7-4"
                                label="Detallhes"
                                placeholder="Envie-nos uma mensagem" 
                                v-model="form.message"
                                value="" 
                                auto-grow                                
                                dense
                                >
                                </v-textarea>
                        </v-col>  
                        
                    </v-row>
                    <button class="btn-enviar" :disabled="!valid" @click="validate">Enviar
                    </button>
                </v-form>
            </v-container>
        </v-col>
    </v-row>
</v-container>
</section> 
</template>  
<script>
import VueRecaptcha from 'vue-recaptcha';
import {
    mask
} from 'vue-the-mask'
export default { 
    components: { VueRecaptcha }, 
    head: {    
    script: [       
      { src: 'https://unpkg.com/vue-recaptcha@latest/dist/vue-recaptcha.min.js',},
      { src: 'https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit', defer: true,  async: true},      
    ]
  },   
    directives: {
        mask
    },      
    data() {
        return {
            valid: null,                     
            form: {
                first_name: '',
                last_name: '',
                email: '',
                phone: '',
                city: '',
                state: '', 
                interested_city: '', 
                time_learn:'',
                investment_value: '',  
                how_know: '',   
                ocupation: '',
                message: '',                
                captchaIsValid: '',                        
              
            },            
            stateItems: ['AC', 'AL', 'AP', 'AM', 'BA', 'DF', 'ES','GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'CE', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'],
            time_learnItems: ['Em até 60 dias', 'de 60 a 120 dias', 'Acima de 120 dias',],
            investment_valueItems: ['de R$ 100.000 a R$ 150.000', 'de R$ 150.000 a 200.000', 'Acima de R$ 200.000',],
            how_knowItems: ['Google', 'Facebook', 'Instagram', 'Linkedin', 'Telefone', 'Indicação de Franqueado', 'Outro'],
            ocupationItems: ['Autônomo', 'Aposentado', 'Empreendedor', 'Estudante', 'Executivo', 'Outro'],
            //  mascaras
            celphoneMask: '(##) #####-####', 
            emailRules: [
                v => !!v || 'O email é obrigatório',
                v => /.+@.+\..+/.test(v) || 'O email deve ser válido',
            ],           
        }
    },   
    methods: {
        validate() {
            if (this.$refs.form.validate()) {
                this.snackbar = true
            }
        },
        async registerFormTest() {
            await this.$axios.post('contact', this.form)
              .then(function(data){
                console.log(data)
                
            }).catch(function(error){
                console.log(error)
            })
        },        
        onCaptchaVerified(recaptchaToken) {
            this.form.captchaIsValid = recaptchaToken; 
            console.log(this.form.captchaIsValid);
        },
        onCaptchaExpired() {
          alert("Recarregue a pagina!");
        }
    },
 }
</script>

<style scoped>
#seja-um-franqueado {
    font-family: var(--primary--font)!important;     
    min-height: 100%;
    background-color: #faf9f9;
}
.custom-title {   
    font-size: 2.30rem !important;
    line-height: 1.17;
    font-weight: 300;
    color: #038145;
    text-align: left;
}
.box-01 {
    max-width: 360px;
}
.custom-subtitle {   
    font-weight: 300;
    font-size: 0.90rem;
    color: #b1b1b1 !important;
}
.text-bold {
    font-weight: 600;
}
.py-form {
    padding-top: 0;
    padding-bottom: 0;
}
.span-text {
    font-size: 0.77rem!important;
}
.span-label {  
    color: #4e4e4e!important;
    font-size: 0.87rem;
    padding-bottom: 1px;
    font-weight: 600;
}
  .btn-enviar {
    width: 100%;
    padding: 0.8em;   
    background: #038145;
    color: #f1f1f1;
    font-weight: 700;
    border-radius: 6px;;
  }
   .btn-enviar:hover {
    width: 100%;
    padding: 0.8em;    
    opacity: 0.8;
    stroke-width: 5;
    stroke-dasharray: 15, 310;
    stroke-dashoffset: 48;
    transition: all 1.55s cubic-bezier(0.19, 1, 0.22, 1); 
    cursor: pointer; 
  } 
</style>
