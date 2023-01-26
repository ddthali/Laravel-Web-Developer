/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({
    delimiters: ['[[', ']]'],
    data() {
        return {
          computer: '',
          onLine: 'on-switch.png',
          offLine: 'off-switch.png',
          connection: null,
          mask: 'card opacity-25 shadow-lg rounded-4 static mt-4',
          unmask: 'card shadow-lg rounded-4 static mt-4',
          nowon: '',
          all: '',
          cols: 1
        }
      },
      methods:{
        doSend(){
          this.connection.send("getResponse");
        }
      },
      created(){
        console.log('%c[Websocket Handshake] : Connecting to WebSocker Server..',"color: #009BFF;")
        this.connection = new WebSocket("ws://workshop2022.ddns.net:8089");

        this.connection.onopen = (event)=>{
          console.log("%c[WebSocket Handshake] : Successfully connected to WebSocker Server !", "color: lime; background-color: darkgreen;");
          // setInterval(this.doSend,5000);
          this.doSend();
          setInterval(this.doSend, 5000);
        }
        this.connection.onmessage = (e)=>{
        let Numb = JSON.parse(e.data);
        this.nowon = Numb.filter((Num)=>{ return Num.Status == "1"}).length;
        this.all = Numb.length;
        this.computer = Numb;

        }

        this.connection.onerror = (event) =>{
          console.error("[WebSocket Handshake] : Can't Connect to WebSocker Server!");
        }
      }
});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */
import './bootstrap';

import '../sass/app.scss';

import 'boxicons';

import AOS from 'aos';

import 'jquery-lazy';

import '@popperjs/core';

app.mount('#app');
