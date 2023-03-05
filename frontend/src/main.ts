import { createApp } from "vue";
import { createPinia } from "pinia";

import App from "./App.vue";
import router from "./router";

import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";

import "./assets/main.css";

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core';

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

/* import specific icons */
import { faArrowUp, faArrowDown, faFaceLaugh, faClock, faDroplet, faEye, faWind, faLocationDot, faServer } from '@fortawesome/free-solid-svg-icons';

/* add icons to the library */
library.add(faArrowUp, faArrowDown, faFaceLaugh, faClock, faDroplet, faEye, faWind, faLocationDot, faServer);

/* add font awesome icon component */



const app = createApp(App);

app.use(createPinia());
app.use(router);
app.component('fa-icon', FontAwesomeIcon)

app.mount("#app");
