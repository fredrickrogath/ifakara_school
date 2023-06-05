<template>
    <div>
        <div
            class="flex-1 mt-1 sm:p-6 px-1 justify-between flex flex-col h-screen"
        >
            <div
                class="d-flex justify-content-between pr-2 pb-1 border-b-2 font-bold border-gray-100"
            >
                <div class="mt-0 pt-0 mb-1">
                    <v-icon
                        class="ml-1 pr-0 mr-0"
                        size="22"
                        @click="setCommentView()"
                    >
                        mdi-keyboard-backspace
                    </v-icon>
                </div>

                Comments on Notification # {{ getChatId }}, Student #{{
                    getStudentId
                }}
            </div>
            <div class="flex sm:items-center justify-between"></div>
            <div
                id="messages"
                class="flex flex-col space-y-4 p-3 px-0 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch"
            >
                <div
                    v-if="!comments.length"
                    class="d-flex justify-content-center"
                >
                    No Messages Found
                </div>
                <div
                    class="chat-message"
                    v-for="comment in comments"
                    :key="comment.id"
                >
                    <div
                        v-if="comment.from_role == 3 || comment.from_role == 1"
                        class="flex items-end justify-end"
                    >
                        <div>
                            <div class="d-flex">
                                <div
                                    class="flex flex-col space-y-2 font-bold max-w-xs mx-2 order-1 items-end"
                                >
                                    <div class="d-flex">
                                        <h6 class="pr-2 text-gray-500">
                                            {{
                                                comment.from_role == 3
                                                    ? "Academic"
                                                    : "Head"
                                            }}
                                        </h6>
                                        <span
                                            class="px-4 py-1 rounded-lg inline-block rounded-br-none bg-indigo-500 text-white"
                                            >{{ comment.body }}</span
                                        >
                                    </div>
                                </div>
                                <!-- <img
                                    src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                                    alt="My profile"
                                    class="w-8 h-8 rounded-full order-2"
                                /> -->
                            </div>
                            <div class="text-xs p-1 float-right">
                                {{ formattedDate(comment.created_at) }}
                            </div>
                        </div>
                    </div>

                    <div
                        v-else="comment.to_role == 4"
                        class="flex col items-end"
                    >
                        <div>
                            <div class="d-flex">
                                <div
                                    class="flex flex-col space-y-2 font-bold max-w-xs mx-2 order-2 items-start"
                                >
                                    <div>
                                        <span
                                            class="px-4 py-1 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600"
                                            >{{ comment.body }}</span
                                        >
                                    </div>
                                </div>
                                <!-- <img
                                    src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                                    alt="My profile"
                                    class="w-8 h-8 rounded-full order-1"
                                /> -->
                            </div>
                            <div class="text-xs p-1">
                                {{ formattedDate(comment.created_at) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t-2 border-gray-200 px-1 pt-1 mb-5 sm:mb-0">
                <div class="relative flex">
                    <input
                        v-model="body"
                        @keyup.enter="sendComment()"
                        type="text"
                        placeholder="Write your message!"
                        class="w-full font-bold focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-2 bg-gray-200 rounded-md py-2"
                    />

                    <div
                        class="absolute right-0 items-center inset-y-0 hidden sm:flex"
                    >
                        <button
                            @click="sendComment()"
                            type="button"
                            class="inline-flex items-center justify-center rounded-lg px-4 py-2 transition duration-500 ease-in-out text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none"
                        >
                            <span class="font-bold">Send</span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                class="h-6 w-6 ml-2 transform rotate-90"
                            >
                                <path
                                    d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"
                                ></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import moment from "moment";
export default {
    mounted() {
        this.showLoader = true;
        // this.getComments();

        // Receiving broadicasting
        // window.Echo.channel("secretary-detect-new-comments").listen(
        //     "Api\\Secretary\\CommentEvent",
        //     (e) => {
        //         this.getComments();
        //     }
        // );

        // window.Echo.channel("secretary-detect-new-comments").listenForWhisper(
        //     "typing",
        //     (e) => {
        //         console.log(`${e.user.name} is typing...`);
        //     }
        // );

        window.Echo.channel(
            "notification-event." + this.getChatId
        ).listen("NotificationEvent", (e) => {
            // console.log(e);
            this.getComments();
        });
    },

    data() {    
        return {
            echo: null,
            body: "",
            notificationId: null,
            comments: [],
            studentlId: null,
        };
    },
    computed: {
        //Add computed properties
        getStudentId() {
            this.studentlId =
                this.$store.getters["HeadStudentModule/getStudentId"];
            return this.$store.getters["HeadStudentModule/getStudentId"];
        },

        getChatId() {
            return this.$store.getters[
                "AcademicStudentModule/getChatId"
            ];
        },
    },
    watch: {
        //Add watchers...
        studentlId(newVal, oldVal) {
            if (newVal !== null) {
                this.getComments();
            }
            // console.log(
            //     `The message has changed from "${oldVal}" to "${newVal}"`
            // );
        },

        notificationId(newVal, oldVal) {
            if (newVal !== null) {
                // this.getComments();
                this.setChatId(this.notificationId);
                // this.setNotificationId(this.notificationId);
            }
            // console.log(
            //     `The message has changed from "${oldVal}" to "${newVal}"`
            // );
        },
    },
    methods: {
        //Add methods...
        setCommentView() {
            this.$store.dispatch("HeadStudentModule/setCommentView");
        },

        setChatId(id) {
            this.$store.dispatch("HeadStudentModule/setChatId", id);
        },

        formattedDate(date) {
            // return moment(date).format("MMMM Do YYYY");
            return moment(date).format("MMMM Do YYYY, h:mm:ss a");
        },

        async getComments() {
            axios
                .post("/head/getComments", {
                    id: this.studentlId,
                })
                .then((response) => {
                    if (response.data.data != null) {
                        this.comments = response.data.data.comments;
                        this.notificationId = response.data.data.id;
                    }
                    // this.amount = "";
                    // this.narration = "";
                    // this.getSchoolPermissions();
                    // console.log(response.data.data);
                });
            // handle response here
        },

        async sendComment() {
            axios
                .post("/head/sendComment", {
                    id: this.notificationId,
                    body: this.body,
                })
                .then((response) => {
                    // this.students = response.data.data;
                    this.body = "";
                    // this.narration = "";
                    // this.getSchoolPermissions();
                    // console.log(response.data.data);
                });
            // handle response here
        },
    },
};
</script>

<style>
.scrollbar-w-2::-webkit-scrollbar {
    width: 0.25rem;
    height: 0.25rem;
}

.scrollbar-track-blue-lighter::-webkit-scrollbar-track {
    --bg-opacity: 1;
    background-color: #f7fafc;
    background-color: rgba(247, 250, 252, var(--bg-opacity));
}

.scrollbar-thumb-blue::-webkit-scrollbar-thumb {
    --bg-opacity: 1;
    background-color: #edf2f7;
    background-color: rgba(237, 242, 247, var(--bg-opacity));
}

.scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
    border-radius: 0.25rem;
}
</style>
