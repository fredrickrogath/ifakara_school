<template>
    <div>
        <jet-banner />

        <div
            class="min-h-screen shadow-xl"
            :style="[
                isDark
                    ? { 'background-color': '#1e1e1e' }
                    : { background: '#FFF' },
            ]"
        >
            <nav
                class="border-b border-gray-100 dark:border-gray-700 sticky top-0 z-50"
                :style="[
                    isDark
                        ? { 'background-color': '#1e1e1e' }
                        : { background: '#FFF' },
                ]"
            >
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <inertia-link :href="route('head.dashboard')">
                                    <jet-application-mark
                                        class="block h-9 w-auto"
                                    />
                                </inertia-link>
                            </div>

                            <!-- Navigation Links -->
                            <div
                                class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"
                            >
                                <jet-nav-link
                                    :href="route('head.dashboard')"
                                    :active="
                                        route().current('head.dashboard') ||
                                        route().current('head.*')
                                    "
                                >
                                    Dashboard
                                </jet-nav-link>
                            </div>

                            <!-- <div
                                class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"
                            >
                                <jet-nav-link
                                    :href="route('tables.show')"
                                    :active="route().current('tables.show')"
                                >
                                    Tables
                                </jet-nav-link>
                            </div> -->

                            <!-- <div
                                class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"
                            >
                                <jet-nav-link
                                    :href="route('dashboard')"
                                    :active="route().current('dashboard1')"
                                >
                                    Dashboard
                                </jet-nav-link>
                            </div> -->

                            <div
                                class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"
                            >
                                <!-- Dark mode btn -->
                                <button
                                    @click="toggleDark()"
                                    class="px-2 py-1 rounded-full text-gray-700 dark:text-gray-400 bg-white dark:bg-transparent"
                                    :style="[
                                        isDark
                                            ? { 'background-color': '#1e1e1e' }
                                            : { background: '#FFF' },
                                    ]"
                                >
                                    <svg
                                        v-if="isDark"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="20px"
                                        height="20px"
                                        preserveAspectRatio="xMidYMid meet"
                                        viewBox="0 0 64 64"
                                    >
                                        <g transform="rotate(90 32 32)">
                                            <path
                                                fill="currentColor"
                                                d="M29 50.54h6V62h-6zM29 2h6v11.46h-6zm21.539 27H62v6H50.539zM2 29h11.461v6H2zm10.909 26.335l-4.242-4.243l8.104-8.102l4.242 4.243zM51.091 8.666l4.242 4.243l-8.104 8.102l-4.242-4.243zm-.004 46.669l-8.104-8.104l4.243-4.243l8.104 8.104zM16.769 21.013l-8.104-8.104l4.242-4.243l8.104 8.104zM32 17c-8.284 0-15 6.716-15 15s6.716 15 15 15s15-6.716 15-15s-6.716-15-15-15m0 25c-5.522 0-10-4.478-10-10s4.478-10 10-10s10 4.478 10 10s-4.478 10-10 10"
                                            />
                                        </g>
                                    </svg>
                                    <svg
                                        v-else
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="20px"
                                        height="20px"
                                        preserveAspectRatio="xMidYMid meet"
                                        viewBox="0 0 26 26"
                                    >
                                        <g transform="rotate(90 13 13)">
                                            <path
                                                fill="currentColor"
                                                d="m9.5.063l-.625 2.28l-2.25-.593L8.25 3.469L6.625 5.156l2.25-.593l.625 2.312l.625-2.313l2.25.594L10.75 3.47l1.625-1.719l-2.25.594L9.5.063zM2.469 6.5l-.5 1.813l-1.813-.47L1.47 9.189L.156 10.53l1.813-.469l.5 1.813L3 10.062l1.813.47L3.5 9.186l1.313-1.343L3 8.312L2.469 6.5zm15.625.688a8.273 8.273 0 0 1 4.937 7.593c0 4.581-3.685 8.281-8.25 8.281a8.29 8.29 0 0 1-7.594-4.968a9.39 9.39 0 0 0 9.25 7.718a9.361 9.361 0 0 0 9.375-9.375a9.396 9.396 0 0 0-7.718-9.25z"
                                            />
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <div class="ml-3 relative">
                                <!-- Teams Dropdown -->
                                <jet-dropdown
                                    align="right"
                                    width="60"
                                    v-if="$page.props.jetstream.hasTeamFeatures"
                                >
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150"
                                            >
                                                {{
                                                    $page.props.user
                                                        .current_team.name
                                                }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <div class="w-60">
                                            <!-- Team Management -->
                                            <template
                                                v-if="
                                                    $page.props.jetstream
                                                        .hasTeamFeatures
                                                "
                                            >
                                                <div
                                                    class="block px-4 py-2 text-xs text-gray-400"
                                                >
                                                    Manage Team
                                                </div>

                                                <!-- Team Settings -->
                                                <jet-dropdown-link
                                                    :href="
                                                        route(
                                                            'teams.show',
                                                            $page.props.user
                                                                .current_team
                                                        )
                                                    "
                                                >
                                                    Team Settings
                                                </jet-dropdown-link>

                                                <jet-dropdown-link
                                                    :href="
                                                        route('teams.create')
                                                    "
                                                    v-if="
                                                        $page.props.jetstream
                                                            .canCreateTeams
                                                    "
                                                >
                                                    Create New Team
                                                </jet-dropdown-link>

                                                <div
                                                    class="border-t border-gray-100"
                                                ></div>

                                                <!-- Team Switcher -->
                                                <div
                                                    class="block px-4 py-2 text-xs text-gray-400"
                                                >
                                                    Switch Teams
                                                </div>

                                                <template
                                                    v-for="team in $page.props
                                                        .user.all_teams"
                                                >
                                                    <form
                                                        @submit.prevent="
                                                            switchToTeam(team)
                                                        "
                                                        :key="team.id"
                                                    >
                                                        <jet-dropdown-link
                                                            as="button"
                                                        >
                                                            <div
                                                                class="flex items-center"
                                                            >
                                                                <svg
                                                                    v-if="
                                                                        team.id ==
                                                                        $page
                                                                            .props
                                                                            .user
                                                                            .current_team_id
                                                                    "
                                                                    class="mr-2 h-5 w-5 text-green-400"
                                                                    fill="none"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    stroke="currentColor"
                                                                    viewBox="0 0 24 24"
                                                                >
                                                                    <path
                                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                                    ></path>
                                                                </svg>
                                                                <div>
                                                                    {{
                                                                        team.name
                                                                    }}
                                                                </div>
                                                            </div>
                                                        </jet-dropdown-link>
                                                    </form>
                                                </template>
                                            </template>
                                        </div>
                                    </template>
                                </jet-dropdown>
                            </div>

                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <jet-dropdown align="right" width="48">
                                    <template #trigger>
                                        <button
                                            v-if="
                                                $page.props.jetstream
                                                    .managesProfilePhotos
                                            "
                                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out"
                                        >
                                            <img
                                                class="h-8 w-8 rounded-full object-cover"
                                                :src="
                                                    $page.props.user
                                                        .profile_photo_url
                                                "
                                                :alt="$page.props.user.name"
                                            />
                                        </button>

                                        <span
                                            v-else
                                            class="inline-flex rounded-md"
                                        >
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 dark:text-gray-400 bg-white dark:bg-transparent hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ $page.props.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div
                                            class="block px-4 py-2 text-xs text-gray-400"
                                        >
                                            Manage Account
                                        </div>

                                        <jet-dropdown-link
                                            :href="route('profile.show')"
                                        >
                                            Profile
                                        </jet-dropdown-link>

                                        <jet-dropdown-link
                                            :href="route('api-tokens.index')"
                                            v-if="
                                                $page.props.jetstream
                                                    .hasApiFeatures
                                            "
                                        >
                                            API Tokens
                                        </jet-dropdown-link>

                                        <div
                                            class="border-t border-gray-100"
                                        ></div>

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <jet-dropdown-link as="button">
                                                Logout
                                            </jet-dropdown-link>
                                        </form>
                                    </template>
                                </jet-dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div
                            class="-mr-2 flex items-center justify-end sm:hidden"
                        >
                            <!-- Dark mode btn -->
                            <button
                                @click="toggleDark()"
                                class="px-2 py-1 rounded-full text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-900"
                                :style="[
                                    isDark
                                        ? { 'background-color': '#1e1e1e' }
                                        : { background: '#FFF' },
                                ]"
                            >
                                <svg
                                    v-if="isDark"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="20px"
                                    height="20px"
                                    preserveAspectRatio="xMidYMid meet"
                                    viewBox="0 0 64 64"
                                >
                                    <g transform="rotate(90 32 32)">
                                        <path
                                            fill="currentColor"
                                            d="M29 50.54h6V62h-6zM29 2h6v11.46h-6zm21.539 27H62v6H50.539zM2 29h11.461v6H2zm10.909 26.335l-4.242-4.243l8.104-8.102l4.242 4.243zM51.091 8.666l4.242 4.243l-8.104 8.102l-4.242-4.243zm-.004 46.669l-8.104-8.104l4.243-4.243l8.104 8.104zM16.769 21.013l-8.104-8.104l4.242-4.243l8.104 8.104zM32 17c-8.284 0-15 6.716-15 15s6.716 15 15 15s15-6.716 15-15s-6.716-15-15-15m0 25c-5.522 0-10-4.478-10-10s4.478-10 10-10s10 4.478 10 10s-4.478 10-10 10"
                                        />
                                    </g>
                                </svg>
                                <svg
                                    v-else
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="20px"
                                    height="20px"
                                    preserveAspectRatio="xMidYMid meet"
                                    viewBox="0 0 26 26"
                                >
                                    <g transform="rotate(90 13 13)">
                                        <path
                                            fill="currentColor"
                                            d="m9.5.063l-.625 2.28l-2.25-.593L8.25 3.469L6.625 5.156l2.25-.593l.625 2.312l.625-2.313l2.25.594L10.75 3.47l1.625-1.719l-2.25.594L9.5.063zM2.469 6.5l-.5 1.813l-1.813-.47L1.47 9.189L.156 10.53l1.813-.469l.5 1.813L3 10.062l1.813.47L3.5 9.186l1.313-1.343L3 8.312L2.469 6.5zm15.625.688a8.273 8.273 0 0 1 4.937 7.593c0 4.581-3.685 8.281-8.25 8.281a8.29 8.29 0 0 1-7.594-4.968a9.39 9.39 0 0 0 9.25 7.718a9.361 9.361 0 0 0 9.375-9.375a9.396 9.396 0 0 0-7.718-9.25z"
                                        />
                                    </g>
                                </svg>
                            </button>
                            <button
                                @click="
                                    show = !show;
                                    showingNavigationDropdown =
                                        !showingNavigationDropdown;
                                "
                                class="inline-flex items-center justify-center p-2 rounded-md dark:text-gray-400 text-gray-700 focus:outline-none transition duration-150 ease-in-out"
                            >
                                <svg
                                    class="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex':
                                                !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex':
                                                showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <Transition duration="550" name="fade-menu">
                    <div
                        v-if="show"
                        class="absolute w-full bg-white dark:bg-gray-900 z-10"
                        :style="[
                            isDark
                                ? { 'background-color': '#1e1e1e' }
                                : { background: '#FFF' },
                        ]"
                    >
                        <div
                            :class="{
                                block: showingNavigationDropdown,
                                hidden: !showingNavigationDropdown,
                            }"
                            class="sm:hidden"
                        >
                            <div class="pt-2 pb-3 space-y-1">
                                <jet-responsive-nav-link
                                    :href="route('head.dashboard')"
                                    :active="route().current('home.dashboard')"
                                >
                                    Dashboard
                                </jet-responsive-nav-link>
                            </div>

                            <!-- <div class="pt-2 pb-3 space-y-1">
                                <jet-responsive-nav-link
                                    :href="route('dashboard')"
                                    :active="route().current('dashboard1')"
                                >
                                    Dashboard
                                </jet-responsive-nav-link>
                            </div> -->

                            <!-- <div class="pt-2 pb-3 space-y-1">
                                <jet-responsive-nav-link
                                    :href="route('dashboard')"
                                    :active="route().current('dashboard2')"
                                >
                                    Dashboard
                                </jet-responsive-nav-link>
                            </div> -->

                            <!-- Responsive Settings Options -->
                            <div class="pt-4 pb-1 border-t border-gray-200">
                                <div class="flex items-center px-4">
                                    <div
                                        v-if="
                                            $page.props.jetstream
                                                .managesProfilePhotos
                                        "
                                        class="flex-shrink-0 mr-3"
                                    >
                                        <img
                                            class="h-10 w-10 rounded-full object-cover"
                                            :src="
                                                $page.props.user
                                                    .profile_photo_url
                                            "
                                            :alt="$page.props.user.name"
                                        />
                                    </div>

                                    <div>
                                        <div
                                            class="font-medium text-base dark:text-gray-600 text-gray-800"
                                        >
                                            {{ $page.props.user.name }}
                                        </div>
                                        <div
                                            class="font-medium text-sm text-gray-500"
                                        >
                                            {{ $page.props.user.email }}
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3 space-y-1">
                                    <jet-responsive-nav-link
                                        :href="route('profile.show')"
                                        :active="
                                            route().current('profile.show')
                                        "
                                    >
                                        Profile
                                    </jet-responsive-nav-link>

                                    <jet-responsive-nav-link
                                        :href="route('api-tokens.index')"
                                        :active="
                                            route().current('api-tokens.index')
                                        "
                                        v-if="
                                            $page.props.jetstream.hasApiFeatures
                                        "
                                    >
                                        API Tokens
                                    </jet-responsive-nav-link>

                                    <!-- Authentication -->
                                    <form
                                        method="POST"
                                        @submit.prevent="logout"
                                    >
                                        <jet-responsive-nav-link as="button">
                                            Logout
                                        </jet-responsive-nav-link>
                                    </form>

                                    <!-- Team Management -->
                                    <template
                                        v-if="
                                            $page.props.jetstream
                                                .hasTeamFeatures
                                        "
                                    >
                                        <div
                                            class="border-t border-gray-200"
                                        ></div>

                                        <div
                                            class="block px-4 py-2 text-xs text-gray-400"
                                        >
                                            Manage Team
                                        </div>

                                        <!-- Team Settings -->
                                        <jet-responsive-nav-link
                                            :href="
                                                route(
                                                    'teams.show',
                                                    $page.props.user
                                                        .current_team
                                                )
                                            "
                                            :active="
                                                route().current('teams.show')
                                            "
                                        >
                                            Team Settings
                                        </jet-responsive-nav-link>

                                        <jet-responsive-nav-link
                                            :href="route('teams.create')"
                                            :active="
                                                route().current('teams.create')
                                            "
                                        >
                                            Create New Team
                                        </jet-responsive-nav-link>

                                        <div
                                            class="border-t border-gray-200"
                                        ></div>

                                        <!-- Team Switcher -->
                                        <div
                                            class="block px-4 py-2 text-xs text-gray-400"
                                        >
                                            Switch Teams
                                        </div>

                                        <template
                                            v-for="team in $page.props.user
                                                .all_teams"
                                        >
                                            <form
                                                @submit.prevent="
                                                    switchToTeam(team)
                                                "
                                                :key="team.id"
                                            >
                                                <jet-responsive-nav-link
                                                    as="button"
                                                >
                                                    <div
                                                        class="flex items-center"
                                                    >
                                                        <svg
                                                            v-if="
                                                                team.id ==
                                                                $page.props.user
                                                                    .current_team_id
                                                            "
                                                            class="mr-2 h-5 w-5 text-green-400"
                                                            fill="none"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24"
                                                        >
                                                            <path
                                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                            ></path>
                                                        </svg>
                                                        <div>
                                                            {{ team.name }}
                                                        </div>
                                                    </div>
                                                </jet-responsive-nav-link>
                                            </form>
                                        </template>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </Transition>
            </nav>

            <!-- Page Heading -->
            <!-- <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"></slot>
                </div>
            </header> -->

            <!-- Page Content -->
            <main class="py-0">
                <slot></slot>
            </main>

            <!-- Modal Portal -->
            <portal-target name="modal" multiple> </portal-target>
        </div>
    </div>
</template>

<!-- For dark mode triggering in tailwind -->
<script setup>
import { useDark, useToggle } from "@vueuse/core";

const isDark = useDark();
const toggleDark = useToggle(isDark);
</script>

<script>
import JetApplicationMark from "@/Jetstream/ApplicationMark";
import JetBanner from "@/Jetstream/Banner";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetNavLink from "@/Jetstream/NavLink";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink";

export default {
    components: {
        JetApplicationMark,
        JetBanner,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink,
    },

    created() {
        if (!this.$store.getters["areRoutesLoaded"]) {
            this.storeRoutes();
            // store posts data
            this.storePosts();
        }
    },

    // mounted() {console.log(this.$store.getters["areRoutesLoaded"])
    //     console.log(this.$store.getters["getRoutes"][0].title)
    // },

    data() {
        return {
            show: false,
            showingNavigationDropdown: false,
        };
    },

    methods: {
        switchToTeam(team) {
            this.$inertia.put(
                route("current-team.update"),
                {
                    team_id: team.id,
                },
                {
                    preserveState: false,
                }
            );
        },

        logout() {
            this.clearRoutes();
            this.$inertia.post(route("logout"));
        },

        //Save routes into store
        storeRoutes() {
            this.$store.dispatch("areRoutesLoaded");
            this.$store.dispatch("storeRoutes", this.$page.props.routes);
        },

        //Save posts into store
        storePosts() {
            this.$store.dispatch("storePosts", this.$page.props.posts);
        },

        clearRoutes() {
            this.$store.dispatch("areRoutesLoaded");
        },
    },

    computed: {
        showTopBarComputed() {
            return this.$store.getters["showTopBar"];
        },
    },
};
</script>

<style>
.fade-menu-enter-active,
.fade-menu-leave-active {
    /* transition: opacity .5s; */
    transition: all 0.3s ease-in-out;
}
.fade-menu-enter /* .fade-leave-active below version 2.1.8 */ {
    /* opacity: 0; */
    transform: translateY(30px);
    opacity: 0;
}
.fade-menu-leave-to /* .fade-leave-active below version 2.1.8 */ {
    /* opacity: 0; */
    transform: translateY(-30px);
    opacity: 0;
}
</style>
