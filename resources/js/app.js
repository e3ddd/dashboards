import './bootstrap';
import {createApp} from 'vue'


import Index                from "./Index.vue";
import RegistrationPage     from "./components/RegistartionForm/RegistrationPage.vue";
import LoginPage            from "./components/LoginForm/LoginPage.vue";
import NavBar               from "./components/NavBar/NavBar.vue";
import AllStatisticDashboard from "./components/Dashboards/AllStatisticDashboard.vue";
import CreatePixel           from "./components/CreatePixel/CreatePixel.vue";
import CreateToken           from "./components/CreateToken/CreateTokenPage.vue";

import TestPage4 from "./components/Test/TestPage4.vue";
import TestPage3 from "./components/Test/TestPage3.vue";
import TestPage2 from "./components/Test/TestPage2.vue";

createApp(Index).mount('#index')
createApp(RegistrationPage).mount('#registration')
createApp(LoginPage).mount('#login')
createApp(NavBar).mount('#nav-bar')
createApp(AllStatisticDashboard).mount('#all-statistic-dashboard')
createApp(CreatePixel).mount('#create-pixel')
createApp(CreateToken).mount('#create-token')
createApp(TestPage4).mount('#test4')
createApp(TestPage3).mount('#test3')
createApp(TestPage2).mount('#test2')
