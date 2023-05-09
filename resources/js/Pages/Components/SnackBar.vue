<template>
    <div class="text-center">
        <span class="d-none" v-if="getSnackBarState"></span>
        <v-snackbar
            v-model="getSnackBar"
            :timeout="timeout"
            rounded="pill"
            color="#22c55e"
            :top="true"
            :right="true"
            :absolute="true"
        >
            {{ text }}
        </v-snackbar>
    </div>
</template>

<script>
export default {
    props: ['message'],

    mounted(){
        this.text = this.message;
    },

    data: () => ({
        text: "",
        timeout: 3000,
        getSnackBar: false,
    }),

    computed: {
        getSnackBarState() {
            return this.$store.getters[
                "ProcurementInvoiceModule/getSnackBarState"
            ];
        },
    },

    watch: {
        getSnackBarState(newVal) {
            this.getSnackBar = true;
        },
    },
};
</script>
