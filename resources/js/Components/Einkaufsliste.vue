<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

dayjs.extend(relativeTime);

const props = defineProps(['liste']);
const form = useForm({
    message: props.liste.message,
});

const editing = ref(false);
</script>
 
<template>
    <div class="p-6 flex space-x-2">
        <div class="flex-1">
            <div class="flex justify-between items-center">
                <div>
                    <span class="text-gray-800">{{ liste.user.name }}</span>
                    <small class="ml-2 text-sm text-gray-600">{{ dayjs(liste.created_at).fromNow() }}</small>
                    <small v-if="liste.created_at !== liste.updated_at" class="text-sm text-gray-600"> &middot;
                        bearbeitet</small>
                </div>
                <Dropdown v-if="liste.user.id === $page.props.auth.user.id">

                    <template #trigger>

                        <button>

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20"
                                fill="currentColor">

                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />

                            </svg>

                        </button>

                    </template>

                    <template #content>

                        <button
                            class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:bg-gray-100 transition duration-150 ease-in-out"
                            @click="editing = true">

                            Bearbeiten

                        </button>
                        <DropdownLink as="button" :href="route('listen.destroy', liste.id)" method="delete">

                            Löschen

                        </DropdownLink>

                    </template>

                </Dropdown>
            </div>
            <form v-if="editing"
                @submit.prevent="form.put(route('listen.update', liste.id), { onSuccess: () => editing = false })">

                <textarea v-model="form.message"
                    class="mt-4 w-full text-gray-900 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>

                <InputError :message="form.errors.message" class="mt-2" />

                <div class="space-x-2">

                    <PrimaryButton class="mt-4">Speichern</PrimaryButton>

                    <button class="mt-4" @click="editing = false; form.reset(); form.clearErrors()">Abbrechen</button>

                </div>

            </form>


            <PrimaryButton v-else class="mt-4 text-lg text-gray-900"><a
                    :href="`http://localhost:8000/listen/${liste.id}`">{{
                        liste.message
                    }}</a>
            </PrimaryButton>

        </div>
    </div>
</template>