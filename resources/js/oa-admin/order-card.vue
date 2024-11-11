<template>
    <b-card :key="order.id"
            :border-variant="borderVariant"
            :header-bg-variant="headerBgVariant"
            :header-text-variant="headerTextVariant"
            align="center"
            :header="header"
            class="col-4 mb-3 w-100">
        <b-card-text>
            Order n. {{ order.id }}, Customer: {{ order.customer_name }} {{ order.customer_surname }}
        </b-card-text>
    </b-card>
</template>

<script>
export default {
    name: "order-card",

    props: {
        order: Object,
        borderVariant: String,
        headerBgVariant: String,
        headerTextVariant: String,
        header: String,
    },
};
</script>
