<script>
export default {
    props: ['patient'],
    methods: {
        detail(id) {
            this.$router.push({ name: 'detail', params: { id } });
        },
        update(id) {
            console.log('update', id);
        },
        deletePatient(id) {
            console.log('delete', id);
        }
    }
}

</script>

<template>
    <tr>
        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            {{ patient.name }}
        </td>
        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            {{ patient.sex }}
        </td>
        <td class="whitespace-nowrap px-4 py-2 text-gray-700"> {{ patient.address }}</td>
        <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center"><button class="inline-block px-4 py-1.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                @click.prevent="detail(patient.id)">Detail</button> <button class="inline-block px-4 py-1.5 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out"
                @click.prevent="update(patient.id)">Update</button> <button class="inline-block px-4 py-1.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                @click.prevent="deletePatient(patient.id)">Delete</button></td>
    </tr>
</template>