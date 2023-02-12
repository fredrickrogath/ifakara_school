<template>
    <!-- <v-col>
        <v-row> -->
    <v-col sm="12" md="12">
        <v-card flat :dark="isDark">
            <v-card elevation="12" data-app>
                <!-- <v-card-title>
                            Nutrition
                            <v-spacer></v-spacer>
                            <v-text-field
                                v-model="search"
                                append-icon="mdi-magnify"
                                label="Search"
                                single-line
                                hide-details
                            ></v-text-field>
                        </v-card-title> -->
                <!-- {{ $page.props.posts }} -->
                <v-data-table
                    mobile-breakpoint="0"
                    :headers="headers"
                    :items="posts"
                    :search="search"
                    dense
                >
                    <template v-slot:item.post_url="{ item }">
                        <v-avatar size="25">
                            <img
                                :src="storagePath + item.post_url"
                                :alt="item.id"
                            />
                        </v-avatar>
                    </template>
                </v-data-table>
            </v-card>
        </v-card>
    </v-col>
    <!-- </v-row>
    </v-col> -->
</template>

<script setup>
import { useDark, useToggle } from "@vueuse/core";

const isDark = useDark();
// const toggleDark = useToggle(isDark);
</script>

<script>
export default {
    props: {
        // postsData: {
            // type: Number,
            // default: [],
            // default(rawProps) {
            //     return { message: "hello" };
            // },

            // DATA TYPES

            // String
            // Number
            // Boolean
            // Array
            // Object
            // Date
            // Function
            // Symbol

            // disabled: [Boolean, Number]
        // },
    },
    data() {
        return {
            contentFullWidthWhenSideBarHides: 10,
            storagePath: window.location.origin + "/storage/systemFiles/",

            search: "",
            headers: [
                {
                    text: "Id",
                    align: "start",
                    sortable: false,
                    value: "id",
                },
                { text: "Type", value: "post_type" },
                { text: "Image", value: "post_url", align: "center" },
                { text: "User", value: "user_id" },
                { text: "Created", value: "created_at" },

                // { text: "Iron (%)", value: "iron" },
            ],
            posts: this.$store.getters["getPosts"],
        };
    },

    computed: {
        contentFullWidthWhenSideBarHidesComputed() {
            return this.contentFullWidthWhenSideBarHides;
        },
    },
};
</script>
