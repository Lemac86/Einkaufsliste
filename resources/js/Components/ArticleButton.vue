<template>
    <div class="flex">
        <HakenIcon v-if="checked" class="block h-7 w-auto fill-current text-gray-800"></HakenIcon>
        <button @click="checked = !checked; notAvailable = false" v-touch:swipe="() => (notAvailable = !notAvailable)"
            class="inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-sm text-white tracking-widest transition ease-in-out duration-50 me-2"
            :class="ButtonColor">
            <slot />
        </button>
    </div>
</template> 
<script setup>
import { ref, computed } from "vue";
import HakenIcon from '@/Components/HakenIcon.vue';
import { onMounted } from "vue";

const checked = ref(false)
const notAvailable = ref(false)
const ButtonColor = computed(() => checked.value ? "bg-green-600" : notAvailable.value ? "bg-red-600" : "bg-blue-600")
</script>