<template>
    <div class="flex">
        <HakenIcon v-if="buttonColor == 'bg-green-600'" class="block h-9 w-auto fill-current text-gray-800"></HakenIcon>
        <button @click="changeColor"
            class="inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-lg text-white tracking-widest transition ease-in-out duration-150 me-2"
            :class="`${buttonColor}`">
            <slot />
        </button>
    </div>
</template> 

<script setup>
import { ref } from "vue";
import HakenIcon from '@/Components/HakenIcon.vue';

const buttonColor = ref('bg-blue-600')
function changeColor() {
    buttonColor.value == "bg-blue-600" ? buttonColor.value = 'bg-green-600' : buttonColor.value = "bg-blue-600"
}
</script>