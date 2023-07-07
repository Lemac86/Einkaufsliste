<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
import Einkaufsliste from '@/Components/Einkaufsliste.vue';

defineProps(['listen']);

const form = useForm({
    name: '',
});
</script>
 
<template>
    <Head title="Einkaufslisten" />

    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('liste.store'), { onSuccess: () => form.reset() })">
                <textarea v-model="form.name" placeholder="Möchtest du eine neue Liste erstellen?"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                <InputError :message="form.errors.name" class="mt-2" />
                <PrimaryButton class="mt-4">Neue Einkaufsliste erstellen</PrimaryButton>
            </form>
            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">

                <Einkaufsliste v-for="liste in listen" :key="liste.id" :liste="liste" />

            </div>
        </div>
    </AuthenticatedLayout>
</template>