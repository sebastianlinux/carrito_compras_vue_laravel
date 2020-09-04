/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
/**/
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
/*window.axios.defaults.headers.common['X-CSRF-TOKEN'] = 'UZJr3N3zMZjLPWISLU0fzQkue2715xeJRn1AmOzT';*/
/*let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    window.axios.defaults.headers.post['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}*/	
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window._ = require('lodash');

window.Vue = require('vue');
import vueResource from 'vue-resource'
Vue.use(vueResource);
Vue.component('main-component', require('./components/MainComponent.vue').default);
Vue.component('nav-component', require('./components/NavComponent.vue').default);

const app = new Vue({
    el: '#app'
});	



import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true,

});
//    authEndpoint: '/broadcasting/auth'