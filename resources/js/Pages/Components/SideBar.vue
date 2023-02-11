<template>
    <v-card
        :dark="isDark"
        class="pa-12"
        flat
        max-width="200px"
        style="position: fixed"
        v-if="$vuetify.breakpoint.smAndUp"
    >
        <v-card width="256">
            <v-navigation-drawer floating permanent>
                <v-list dense rounded class="text-center">
                    <v-list-item
                        v-for="(myRoute, i) in routes"
                        :key="myRoute.title"
                        link
                        class="border-r-4 border-indigo-500"
                        :class="
                            route().current(myRoute.route)
                                ? 'bg-indigo-100 dark:bg-gray-900'
                                : 'bg-gray-50 dark:bg-slate-900'
                        "
                        :style="[
                            isDark && route().current(myRoute.route)
                                ? { 'background-color': '#6366F1' }
                                : isDark
                                ? { background: '#1e1e1e' }
                                : {},
                        ]"
                    >
                        <my-custom-link
                            :href="route(myRoute.route)"
                            :active="route().current(myRoute.route)"
                        >
                            <v-list-item-icon>
                                <v-icon>{{ myRoute.icon }}</v-icon>
                            </v-list-item-icon>

                            <v-list-item-content>
                                <v-list-item-title class="py-1 font-bold">{{
                                    myRoute.title
                                }}</v-list-item-title>
                            </v-list-item-content>
                        </my-custom-link>
                    </v-list-item>
                </v-list>
            </v-navigation-drawer>
        </v-card>

        <div class="h-2"></div>

        <v-card elevation="12">
            <pie-chart3-d></pie-chart3-d>
        </v-card>
    </v-card>

    <!-- <v-expansion-panels style="position: fixed" v-else :dark="isDark">
        <v-expansion-panel>
            <v-expansion-panel-header> SideBar </v-expansion-panel-header>
            <v-expansion-panel-content>
                <v-card :dark="isDark" class="pa-12" flat>
                    <v-card elevation="12" width="256">
                        <v-navigation-drawer floating permanent>
                            <v-list dense rounded class="text-center">
                                <v-list-item
                                    v-for="item in items"
                                    :key="item.title"
                                    link
                                >
                                    <v-list-item-icon>
                                        <v-icon>{{ item.icon }}</v-icon>
                                    </v-list-item-icon>

                                    <v-list-item-content>
                                        <v-list-item-title class="font-bold">{{
                                            item.title
                                        }}</v-list-item-title>
                                    </v-list-item-content>
                                </v-list-item>
                            </v-list>
                        </v-navigation-drawer>
                    </v-card>
                </v-card>
            </v-expansion-panel-content>
        </v-expansion-panel>
    </v-expansion-panels> -->
</template>

<script setup>
import { useDark, useToggle } from "@vueuse/core";

const isDark = useDark();
const toggleDark = useToggle(isDark);
</script>

<script>
import MyCustomLink from "@/Jetstream/MyCustomLink";
import PieChart3D from '../Components/Charts/GoogleCharts/PieChart3D.vue';

export default {
    components: {
        MyCustomLink,
        PieChart3D,
    },

    mounted() {
        this.initializeRoutes();
    },

    data() {
        return {
            routes: [],
        };
    },

    methods: {
        initializeRoutes() {
            this.$store.getters["getRoutes"].forEach((route) => {
                this.routes.push(route);
            });
        },

        // select: function (path) {
        //     if (path.extension !== "") {
        //         window.location.href = path.url + path.extension;
        //     }
        //     window.location.href = path.url;
        // },
    },

    computed: {},
};
</script>
