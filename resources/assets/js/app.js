Vue.config.devtools = true;



import Vue from 'vue'

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


window.events = new Vue();

const app = new Vue({
  el: '#app',
})

// After you create app
window.__VUE_DEVTOOLS_GLOBAL_HOOK__.Vue = app.constructor;