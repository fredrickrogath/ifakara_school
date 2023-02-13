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
                <v-list
                    v-for="(myRoute, i) in routes"
                    :key="myRoute.menu_title"
                    dense
                    rounded
                    class="text-center"
                >
                    <v-subheader>{{ myRoute.menu_title }}</v-subheader>

                    <div
                        v-for="(levelOne, i) in myRoute.levelOne"
                        :key="levelOne.title"
                    >
                        <v-list-group
                            v-if="levelOne.levelTwo"
                            no-action
                            sub-group
                        >
                            <!-- <div> -->
                            <!-- <template v-slot:activator> -->
                            <template>
                                <v-list-item
                                    class="border-r-4 border-indigo-500 my-1"
                                    :class="
                                        route().current(levelOne.route)
                                            ? 'bg-indigo-100 dark:bg-gray-900'
                                            : 'bg-gray-50 dark:bg-slate-900'
                                    "
                                >
                                    <v-list-item-title>{{
                                        levelOne.title
                                    }}</v-list-item-title>
                                </v-list-item>
                            </template>
                            <!-- </div> -->

                            <v-list-item
                                v-for="(levelTwo, i) in levelOne.levelTwo"
                                :key="levelTwo.title"
                                link
                                class="border-l-4 border-indigo-400 my-1"
                                :class="
                                    route().current(levelTwo.route)
                                        ? 'bg-indigo-100 dark:bg-gray-900'
                                        : 'bg-gray-50 dark:bg-slate-900'
                                "
                                :style="[
                                    isDark && route().current(levelTwo.route)
                                        ? { 'background-color': '#6366F1' }
                                        : isDark
                                        ? { background: '#1e1e1e' }
                                        : {},
                                ]"
                            >
                                <v-list-item-title
                                    v-text="levelTwo.title"
                                ></v-list-item-title>

                                <v-list-item-icon>
                                    <v-icon v-text="levelTwo.icon"></v-icon>
                                </v-list-item-icon>
                            </v-list-item>
                        </v-list-group>

                        <v-list-item
                            v-else
                            link
                            class="border-r-4 border-indigo-500 my-1"
                            :class="
                                route().current(levelOne.route)
                                    ? 'bg-indigo-100 dark:bg-gray-900'
                                    : 'bg-gray-50 dark:bg-slate-900'
                            "
                            :style="[
                                isDark && route().current(levelOne.route)
                                    ? { 'background-color': '#6366F1' }
                                    : isDark
                                    ? { background: '#1e1e1e' }
                                    : {},
                            ]"
                        >
                            <my-custom-link
                                :href="route(levelOne.route)"
                                :active="route().current(levelOne.route)"
                            >
                                <v-list-item-icon>
                                    <v-icon>{{ levelOne.icon }}</v-icon>
                                </v-list-item-icon>

                                <v-list-item-content>
                                    <v-list-item-title class="py-1 font-bold">{{
                                        levelOne.title
                                    }}</v-list-item-title>
                                </v-list-item-content>
                            </my-custom-link>
                        </v-list-item>
                    </div>
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
import PieChart3D from "../Components/Charts/GoogleCharts/PieChart3D.vue";

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
            // this.$page.props.routes.forEach((route) => {
            //     this.routes.push(route);
            // });
            // console.log(this.routes);
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
