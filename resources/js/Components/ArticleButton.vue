<template>
    <div class="flex">
        <HakenIcon v-if="form.checked" class="block h-7 w-auto fill-current"></HakenIcon>
        <button
            @click="form.checked = !form.checked; form.notAvailable = false; form.put(route('liste.artikel.update', [liste.id, artikel.id]))"
            v-touch:swipe="() => { form.notAvailable = !form.notAvailable; form.put(route('liste.artikel.update', [liste.id, artikel.id])) }"
            class="inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-sm text-white tracking-widest transition ease-in-out duration-50 me-2"
            :class="ButtonColor">
            <slot />
        </button>
    </div>
</template> 
<script setup>
import { ref, computed } from "vue";
import HakenIcon from '@/Components/HakenIcon.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps(['artikel', 'liste']);

const form = useForm({
    name: props.artikel.name,
    checked: false,
    notAvailable: false,
});

const ButtonColor = computed(() => form.checked ? "bg-green-600" : form.notAvailable ? "bg-red-600" : "bg-blue-600")


</script>