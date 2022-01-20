<template>
    <Head title="DailyTask" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                DailyTask
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- component -->
                        <div class="container">
                            <table class="text-left w-full">
                                <thead class="bg-black flex text-white w-full">
                                    <tr class="flex w-full mb-4">
                                        <th class="p-3 w-1/4">Week</th>
                                        <th class="p-3 w-1/4">Site</th>
                                        <th class="p-3 w-1/4">District</th>
                                        <th class="p-3 w-1/4">Sla</th>
                                        <th class="p-3 w-1/2"></th>
                                    </tr>
                                </thead>
                                <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->
                                <tbody
                                    class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full"
                                    style="height: 50vh"
                                >
                                    <tr
                                        class="flex w-full mb-4"
                                        v-for="(row, index) in data"
                                        :key="index"
                                    >
                                        <td class="p-4 w-1/4">
                                            {{ row.week }}
                                        </td>
                                        <td class="p-4 w-1/4">
                                            {{ row.site }}
                                        </td>
                                        <td class="p-4 w-1/4">
                                            {{ row.district }}
                                        </td>
                                        <td class="p-4 w-1/4">{{ row.sla }}</td>
                                        <td class="p-4 w-1/4">
                                            <button
                                                class="px-2 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none"
                                            >
                                                View Details
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
    props: ["data"],
    data() {
        return {
            editfalse: false,
            form: {
                user_id: "",
                week: "",
                site: "",
                district: "",
                ticket: "",
                type: "",
                subject: "",
                raisedby: "",
                position: "",
                department: "",
                days: "",
                hitmiss: false,
                status: false,
                sla: false,
                remark: "",
                publish: 0,
            },
        };
    },
    methods: {
        openModal: function () {
            $("#modal").modal("show");
        },
        closeModal: function () {
            $("#modal").modal("hide");
            this.reset();
            this.editMode = false;
        },
        reset: function () {
            this.form = {
                name: null,
                phone: null,
            };
        },
        save: function (data) {
            this.$inertia.post("/admin/contacts", data);
            this.reset();
            this.closeModal();
            this.editMode = false;
        },
        edit: function (data) {
            this.form = Object.assign({}, data);
            this.editMode = true;
            this.openModal();
        },
        update: function (data) {
            if (!confirm("Sure")) return;
            data._method = "PUT";
            this.$inertia.post("/admin/contacts/" + data.id, data);
            this.reset();
            this.closeModal();
        },
        deleteRow: function (data) {
            if (!confirm("Sure")) return;
            data._method = "DELETE";
            this.$inertia.post("/admin/contacts/" + data.id, data);
            this.reset();
            this.closeModal();
        },
    },
    computed: {},
};
</script>
