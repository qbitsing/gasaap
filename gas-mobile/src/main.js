import Vue from 'nativescript-vue';
import Login from './Login';
import store from './store';

import './styles.scss';

new Vue({
  store,
  render: h => h(Login),
}).$start();
