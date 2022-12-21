<script>
import { mapState, mapActions } from 'pinia';
import { usePatientStore } from '../stores/patient';

export default {
    created() {
        this.getPatients();
    },

    computed: {
        ...mapState(usePatientStore, ['patients']),
    },

    methods: {
        ...mapActions(usePatientStore, ['getPatients']),
    },
}

</script>

<template>
    <div>
        <h1 class="text-3xl font-bold underline">
            Hello world!
        </h1>
    </div>
</template>