<script>
import { mapState, mapActions } from 'pinia';
import { usePatientStore } from '../stores/patient';

export default {
    computed: {
        ...mapState(usePatientStore, ["patient"]),
    },
    methods: {
        ...mapActions(usePatientStore, ["getPatientDetail"]),

        backToHome() {
            this.$router.push({ path: '/' });
        },
    },

    created() {
        this.getPatientDetail(this.$route.params.id);
    },
}
</script>

<template>
    <div class="px-12 py-12">
        <div class="px-8 py-8">
            <h1 class="text-3xl font-bold text-center">Simple Phalcon CRUD with Vue.js & TailwindCSS</h1>
        </div>
        <div class="px-4 py-4">
            <h3 class="text-xl font-bold">Detail of Patient</h3>
        </div>
        <div class="px-4 py-2">
            <h4 class="text-l font-bold">Name</h4>
            <p class="text-l">{{patient.name}}</p>
        </div>
        <div class="px-4 py-2">
            <h4 class="text-l font-bold">Sex</h4>
            <p class="text-l">{{patient.sex}}</p>
        </div>
        <div class="px-4 py-2">
            <h4 class="text-l font-bold">Religion</h4>
            <p class="text-l">{{patient.religion}}</p>
        </div>
        <div class="px-4 py-2">
            <h4 class="text-l font-bold">NIK</h4>
            <p class="text-l">{{patient.nik}}</p>
        </div>
        <div class="px-4 py-2">
            <h4 class="text-l font-bold">Phone Number</h4>
            <p class="text-l">{{patient.phone}}</p>
        </div>
        <div class="px-4 py-2">
            <h4 class="text-l font-bold">Address</h4>
            <p class="text-l">{{patient.address}}</p>
        </div>
        <div class="px-4 py-2">
            <button @click.prevent="backToHome()" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Back</button>
        </div>
    </div>
</template>