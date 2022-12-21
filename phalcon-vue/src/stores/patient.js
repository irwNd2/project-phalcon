import { ref, computed } from "vue";
import { defineStore } from "pinia";
import axios from "axios";

export const usePatientStore = defineStore("patient", {
  state: () => ({
    baseUrl: "http://localhost/patients-api/patients/",
    patients: [],
    patient: {},
  }),
  actions: {
    async getPatients() {
      try {
        const { data } = await axios({
          method: "GET",
          url: this.baseUrl,
        });
        this.patients = data.result;
      } catch (error) {
        console.log(error);
      }
    },
  },
});
