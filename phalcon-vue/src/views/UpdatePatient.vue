<script>
import { mapActions, mapState } from 'pinia';
import { usePatientStore } from '../stores/patient';

export default {
    computed: {
        ...mapState(usePatientStore, ["patient"]),
    },
    methods: {
        ...mapActions(usePatientStore, ['updatePatient', 'getPatientDetail']),
        
        updatePatientButton() {
            const patient = {
                name: this.patient.name,
                nik: this.patient.nik,
                sex: this.patient.sex,
                religion: this.patient.religion,
                phone: this.patient.phone,
                address: this.patient.address,
            }
            this.updatePatient(this.$route.params.id, patient);
        },
        
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
            <div class="mx-auto max-w-screen-xl px-4 py-2 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-lg text-center">
                    <h1 class="text-xl font-bold sm:text-3xl">Update Patient</h1>
                </div>

                <form class="mx-auto mt-8 mb-0 max-w-md space-y-4" @submit.prevent="updatePatientButton">
                    <div>
                        <label>Name</label>

                        <div class="relative">
                            <input type="text" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm"
                                placeholder="Enter patient name" v-model="this.patient.name" />
                        </div>
                    </div>

                    <div>
                        <label>NIK</label>
                        <div class="relative">
                            <input type="text" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm"
                                placeholder="Enter patient NIK" v-model="this.patient.nik" />

                        </div>
                    </div>
                    <div>
                        <label>Sex</label>
                        <div class="relative">
                            <select class="form-select appearance-none
      block
      w-full
      px-3
      py-1.5
      text-sm
      shadow-sm
      font-normal
      text-black
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-200
      rounded-lg
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example"
                                v-model="this.patient.sex">
                                <option selected disabled>Select Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>

                        </div>
                    </div>

                    <div>
                        <label>Religion</label>
                        <div class="relative">
                            <select class="form-select appearance-none
      block
      w-full
      px-3
      py-1.5
      text-sm
      shadow-sm
      font-normal
      text-black
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-200
      rounded-lg
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example"
                                v-model="this.patient.religion">
                                <option selected disabled>Select Religion</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                            </select>

                        </div>
                    </div>

                    <div>
                        <label>Phone Number</label>

                        <div class="relative">
                            <input type="text" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm"
                                placeholder="Enter patient phone number" v-model="this.patient.phone" />
                        </div>
                    </div>

                    <div>
                        <label>Address</label>

                        <div class="relative">
                            <input type="text" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm"
                                placeholder="Enter patient address" v-model="this.patient.address" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end">
                        <button @click.prevent="backToHome()"
                            class="inline-block px-8 py-2 border-2 border-yellow-500 text-yellow-500 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                            Back
                        </button>

                        <button type="submit"
                            class="ml-2 inline-block px-8 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>

</template>