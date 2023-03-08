<template>
    <div class="text-center">
        <v-snackbar
            v-model="getSnackBarState"
            :timeout="timeout"
            rounded="pill"
            color="green"
            :top="true"
            :right="true"
        >
            {{ getSnackBarMessage }}
        </v-snackbar>
    </div>
</template>

<script>
export default {
    data: () => ({
        text: "My timeout is set to 2000.",
        timeout: 2000,
    }),

    computed: {
        getSnackBarState() {
            return this.$store.getters[
                "ProcurementInvoiceModule/getSnackBarState"
            ];
        },

        getSnackBarMessage() {
            return this.$store.getters[
                "ProcurementInvoiceModule/getSnackBarMessage"
            ];
        },
    },

    methods: {
      // getSnackBarState() {
      //       return this.$store.getters[
      //           "ProcurementInvoiceModule/getSnackBarState"
      //       ];
      //   },
    }
};
</script>
