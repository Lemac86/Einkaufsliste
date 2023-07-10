<template>
    <div class="flex">
        <HakenIcon v-if="checked" class="block h-9 w-auto fill-current text-gray-800"></HakenIcon>
        <button @click="checked = !checked"
            class="inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-lg text-white tracking-widest transition ease-in-out duration-50 me-2"
            :class="checked ? 'bg-green-600' : 'bg-blue-600'">
            <slot />
        </button>
    </div>
</template> 

<script setup>
import { ref } from "vue";
import HakenIcon from '@/Components/HakenIcon.vue';
import { computed } from "vue";

const checked = ref(false)

</script>