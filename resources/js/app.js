require('./bootstrap');

require('alpinejs');

import Vue from 'vue';
import 'animate.css';

let files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Initialising vue instance on any element with a class .vue-app
document.querySelectorAll(".vue-app").forEach((element) => new Vue({el: element}));
