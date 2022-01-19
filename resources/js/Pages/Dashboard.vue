<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You're logged in!
                        {{ $page.props.auth.user.name }}
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
    data() {
        return {
            user: null,
        };
    },
    methods: {
        // logout() {
        //     axios.post("/api/logout").then(() => {
        //         // this.$router.push({ name: "Home" });
        //         document.location.href = "/";
        //     });
        // },
    },
    mounted() {
        // axios.get("/api/user").then((res) => {
        //     this.user = res.data;
        // });
    },
};
</script>
