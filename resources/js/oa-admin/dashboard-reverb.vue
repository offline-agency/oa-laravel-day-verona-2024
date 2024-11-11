<template>
    <div class="content-body w-75">
        <h2 class="col-12 text-center fw-bold text-white">Reverb</h2>
        <div class="row mt-3">
            <div class="col-4 d-flex justify-content-center" v-for="(orderGroup, index) in orderGroups" :key="index">
                <b-card-group class="gap-4" deck>
                    <orderCard
                        v-for="order in orderGroup.orders"
                        :key="order.id"
                        :order="order"
                        :border-variant="orderGroup.borderVariant"
                        :header-bg-variant="orderGroup.headerBgVariant"
                        :header-text-variant="orderGroup.headerTextVariant"
                        :header="orderGroup.header"/>
                </b-card-group>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4 col-12" v-if="hasOrders">
            <b-button variant="info" class="text-white" @click="clearOrders">Clear</b-button>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import orderCard from "./order-card.vue";

export default {
    name: "dashboard-reverb",

    components: {
        orderCard
    },

    computed: {
        ...mapGetters([
            'order'
        ]),
        orderGroups() {
            return [
                {
                    orders: this.order.newOrders,
                    borderVariant: "primary",
                    headerBgVariant: "primary",
                    headerTextVariant: "white",
                    header: "New Orders"
                },
                {
                    orders: this.order.deliveringOrders,
                    borderVariant: "warning",
                    headerBgVariant: "warning",
                    headerTextVariant: "white",
                    header: "Delivering Orders"
                },
                {
                    orders: this.order.deliveredOrders,
                    borderVariant: "success",
                    headerBgVariant: "success",
                    headerTextVariant: "white",
                    header: "Delivered Orders"
                }
            ];
        },
        hasOrders() {
            return this.order.newOrders.length > 0
                || this.order.deliveringOrders.length > 0
                || this.order.deliveredOrders.length > 0;
        }
    },

    methods: {
        clearOrders() {
            this.$store.dispatch('emptyOrders');
        }
    },

    mounted() {
        if (
            import.meta.env.VITE_BROADCAST_CONNECTION === 'reverb'
            && import.meta.env.VITE_BROADCAST_DRIVER === 'reverb'
        ) {
            const channel = window.Reverb.channel('orders_status');

            channel.listen('OrderChangedStatus', (event) => {
                this.$store.dispatch('addOrders', event);
            });
        }
    }
};
</script>

<style>
.content-body {
    background: black;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%, -50%);
}
</style>
