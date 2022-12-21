<script>
export default {
    props: ['patient'],
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
        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            {{ patient.religion }}
        </td>
        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ patient.nik }}</td>
        <td class="whitespace-nowrap px-4 py-2 text-gray-700"> {{ patient.phone }}</td>
        <td class="whitespace-nowrap px-4 py-2 text-gray-700"> {{ patient.address }}</td>
        <td class="whitespace-nowrap px-4 py-2 text-gray-700"><button>Detail</button> <button>Update</button> <button>Delete</button></td>
    </tr>
</template>