import './bootstrap';
import {createApp} from 'vue'


import Index            from "./Index.vue";
import RegistrationPage from "./components/RegistartionForm/RegistrationPage.vue";
import LoginPage        from "./components/LoginForm/LoginPage.vue";
import VueApexCharts from "vue3-apexcharts";

createApp(Index).mount('#index')
createApp(RegistrationPage).mount('#registration')
createApp(LoginPage).mount('#login')
