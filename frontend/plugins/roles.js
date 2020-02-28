import Vue from 'vue'
import { Can, abilitiesPlugin } from '@casl/vue'
import { abilityBuilder } from '@casl/ability'


Vue.component('Can', Can)

let abilities = AbilityBuilder.define(can => {
    can('post', 'comment')
})
Vue.use(abilitiesPlugin, abilities)

