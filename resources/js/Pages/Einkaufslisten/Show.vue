<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
import Artikel from '@/Components/Artikel.vue';


const props = defineProps(['liste']);

const form = useForm({
    name: '',
});
console.log(props.liste)
</script>
 
<template>
    <Head title="Einkaufsliste" />

    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">

                {{ liste.name }}

            </div>
            <form @submit.prevent="form.post(route('liste.artikel.store', liste.id), { onSuccess: () => form.reset() })">
                <textarea v-model="form.name" placeholder="Was brauchen wir?"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                <InputError :message="form.errors.message" class="mt-2" />
                <PrimaryButton class="mt-4">Artikel hinzufügen</PrimaryButton>
            </form>
            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                <Artikel v-for="artikel of liste.artikel" :artikel="artikel"></Artikel>
            </div>
        </div>
    </AuthenticatedLayout>
</template>