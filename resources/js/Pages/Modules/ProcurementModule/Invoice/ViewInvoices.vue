<template>
    <div class="pt-10">
        <div class="d-flex justify-content-between">
            <div>
                hello invoice
            </div>

            <a @click="setInvoiceView()" class="btn">
                cancel
            </a>
        </div>

        <div class="text-center">
            Invoice id : {{ getInvoiceId }}
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        setInvoiceView() {
            this.$store.dispatch("ProcurementInvoiceModule/setInvoiceView", null);
        },
    },

    computed: {
        getInvoiceId() {
            return this.$store.getters["ProcurementInvoiceModule/getInvoiceId"];
        },
    },
}
</script>
