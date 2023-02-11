<template>
    
    <div class="py-4"> {{ price }} </div>
</template>

<script>
import { Money } from "v-money";
export default {
    components: { Money },
    data() {
        return {
            price: 123970089809.45,
            money: {
                decimal: ".",
                thousands: ",",
                prefix: "R$",
                suffix: "#",
                precision: 2,
                masked: false,
            },
        };
    },
};
</script>
