import {createApp} from 'vue';
import DashboardReverb from "./oa-admin/dashboard-reverb.vue";
import DashboardPusher from "./oa-admin/dashboard-pusher.vue";
import OrderCard from "./oa-admin/order-card.vue";
import BootstrapVue from 'bootstrap-vue-3';
import store from "./vuex/store.js";
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

const app = createApp({
    components: {
        DashboardReverb,
        DashboardPusher,
        OrderCard
    }
});

app.use(BootstrapVue);
app.use(store);

app.mount('#oa-content');
