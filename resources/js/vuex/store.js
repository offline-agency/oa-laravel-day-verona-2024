import {createStore} from 'vuex';
import createPersistedState from 'vuex-persistedstate';

export default createStore({
    plugins: [
        createPersistedState()
    ],

    state: {
        order: {
            newOrders: [],
            deliveringOrders: [],
            deliveredOrders: [],
        }
    },

    getters: {
        order: (state) => {
            return state.order;
        }
    },

    mutations: {
        ADD_ORDERS: (state, payload) => {
            const updateOrders = (currentOrders, orderId) => {
                return currentOrders.filter(order => order.id !== orderId);
            };

            switch (payload.status) {
                case 'new':
                    state.order.deliveringOrders = updateOrders(state.order.deliveringOrders, payload.id);
                    state.order.deliveredOrders = updateOrders(state.order.deliveredOrders, payload.id);
                    state.order.newOrders.push(payload);
                    break;

                case 'delivering':
                    state.order.newOrders = updateOrders(state.order.newOrders, payload.id);
                    state.order.deliveredOrders = updateOrders(state.order.deliveredOrders, payload.id);
                    state.order.deliveringOrders.push(payload);
                    break;

                case 'delivered':
                    state.order.newOrders = updateOrders(state.order.newOrders, payload.id);
                    state.order.deliveringOrders = updateOrders(state.order.deliveringOrders, payload.id);
                    state.order.deliveredOrders.push(payload);
                    break;

                default:
                    console.log('Unknown order status:', payload.status);
                    break;
            }
        },

        EMPTY_ORDERS: (state, payload) => {
            state.order = {
                newOrders: [],
                deliveringOrders: [],
                deliveredOrders: [],
            }
        }
    },

    actions: {
        addOrders: ({commit}, payload) => {
            commit('ADD_ORDERS', payload);
        },
        emptyOrders: ({commit}, payload) => {
            commit('EMPTY_ORDERS', payload);
        },
    }
});
