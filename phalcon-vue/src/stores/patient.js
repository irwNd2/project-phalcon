import { defineStore } from "pinia";
import axios from "axios";
import router from "../router";

//error untuk sekarang hanya saya console.log di terminal browser

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

    async getPatientDetail(id) {
      try {
        const { data } = await axios({
          method: "GET",
          url: this.baseUrl + id,
        });
        this.patient = data.result;
      } catch (error) {
        console.log(error);
      }
    },

    async createPatient(patient) {
      try {
        const { data } = await axios({
          method: "POST",
          url: this.baseUrl,
          data: patient,
          headers: {
            "Content-Type": "application/json",
          },
        });
        router.push('/'); // Saya make this.router.push() gak work (entah kenapa) makanya saya make router.push() dgn mengimport router dari router/index.js
        this.patients.push(data.result);
      } catch (error) {
        console.log(error.response.data.status);
      }
    },

    async updatePatient(id, patient) {
      try {
        const { data } = await axios({
          method: "PUT",
          url: this.baseUrl + id,
          data: patient,
          headers: {
            "Content-Type": "application/json",
          },
        });
        router.push('/'); // Saya make this.router.push() gak work (entah kenapa) makanya saya make router.push() dgn mengimport router dari router/index.js
        this.patients = this.patients.map((patient) =>
          patient.id === id ? data.result : patient
        );
      } catch (error) {
        console.log(error);
      }
    },

    async deletePatient(id) {
      try {
        await axios({
          method: "DELETE",
          url: this.baseUrl + id,
        });
        this.patients = this.patients.filter((patient) => patient.id !== id);
      } catch (error) {
        console.log(error);
      }
    }
  },
});
