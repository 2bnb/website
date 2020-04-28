// src/main.js

import Vue from 'vue'
import vuetify from 'vuetify' // path to vuetify export

new Vue({
	vuetify,
}).$mount('#app')

Vue.component(
	'passport-clients',
	require('./components/passport/Clients.vue').default
);

Vue.component(
	'passport-authorized-clients',
	require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
	'passport-personal-access-tokens',
	require('./components/passport/PersonalAccessTokens.vue').default
);
