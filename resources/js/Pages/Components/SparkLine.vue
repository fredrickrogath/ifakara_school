<template>
    <v-card
        class="text-center col-12"
        :class="
            isDark
                ? 'bg-red-700'
                : 'bg-gradient-to-tr from-blue-500 to-indigo-900'
        "
        :style="[
            isDark ? { 'background-color': '#1e1e1e' } : { background: '' },
        ]"
        outlined
    >
        <v-card-text>
            <v-sheet color="rgba(0, 0, 0, .12)">
                <v-sparkline
                    label-size="20"
                    auto-draw
                    :value="value"
                    color="rgba(255, 255, 255, .7)"
                    height="130"
                    width="500"
                    show-labels
                    padding="44"
                    line-width="4"
                    stroke-linecap="round"
                    smooth
                >
                    <template v-slot:label="item">
                        Tsh {{ item.value }}
                    </template>
                </v-sparkline>
            </v-sheet>
        </v-card-text>

        <v-card-text>
            <div class="text-h4 font-weight-thin dark:text-gray-200 text-white">
                Report for the Last 24h
            </div>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions
            class="justify-cente dark:bg-red-500 bg-transparent"
            :class="
                isDark ? 'bg-gradient-to-tr from-blue-500 to-indigo-900' : ''
            "
        >
            <v-btn block text @click="tulia">
                <div class="dark:text-gray-200 text-white">Go to Report</div>
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
export default {
    data: () => ({
        value: [
            423, 446, 675, 510,
            // 590,
            // 610,
            // 760,
        ],
    }),

    methods: {
        tulia() {
            alert("Tulia kwanza acha mbwembwe");
        },
    },
};
</script>

<script setup>
import { useDark, useToggle } from "@vueuse/core";

const isDark = useDark();
</script>
