import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import axios from 'axios'

export const usePatientStore = defineStore("patient", {
    state: () => ({
        baseUrl: "http://localhost/patients-api/patients/",
        patients: [],
        patient: {},
    }),
    actions: {
        async getPatients() {
            const response = await axios.get(this.baseUrl)
            this.patients = response.data
        },
    }
})