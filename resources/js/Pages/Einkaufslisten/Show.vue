<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
import Einkaufsliste from '@/Components/Einkaufsliste.vue';

defineProps(['liste']);

const form = useForm({
    message: '',
});
</script>
 
<template>
    <Head title="Einkaufsliste" />

    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">

                {{ liste.message }}

            </div>
        </div>
    </AuthenticatedLayout>
</template>