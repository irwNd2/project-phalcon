<script>
import { mapState, mapActions } from 'pinia';
import { usePatientStore } from '../stores/patient';
import PatientTableRow from '../components/PatientTableRow.vue';

export default {
    created() {
        this.getPatients();
    },
    computed: {
        ...mapState(usePatientStore, ["patients"]),
    },
    methods: {
        ...mapActions(usePatientStore, ["getPatients"]),
    },
    components: { PatientTableRow }
}

</script>

<template>
    <div class="px-12 py-12">
        <div class="px-8 py-8">
            <h1 class="text-3xl font-bold text-center">Simple Phalcon CRUD with Vue.js & TailwindCSS</h1>

        </div>
        <div class="px-4 py-4">
            <h3 class="text-xl font-bold">Table List of Patient</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            Name
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            Sex
                        </th>

                        <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                            Address
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 text-center font-medium text-gray-900">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    <PatientTableRow v-for="patient in patients" :key="patient.id" :patient="patient" />
                </tbody>
            </table>
        </div>
    </div>



</template>