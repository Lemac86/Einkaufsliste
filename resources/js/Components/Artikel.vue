<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ArticleButton from '@/Components/ArticleButton.vue';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

dayjs.extend(relativeTime);

const props = defineProps(['artikel', 'liste']);
const form = useForm({
    name: props.artikel.name,
});

const editing = ref(false);
</script>
 
<template>
    <div class="p-1 flex space-x-1">
        <div class="flex-1">
            <div class="flex justify-between items-center">
                <form v-if="editing"
                    @submit.prevent="form.put(route('liste.artikel.update', [liste.id, artikel.id]), { onSuccess: () => editing = false })">

                    <textarea v-model="form.name"
                        class="mt-4 w-full text-gray-900 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                    <InputError :message="form.errors.name" class="mt-2" />

                    <div class="space-x-2">

                        <PrimaryButton class="mt-4">Speichern</PrimaryButton>

                        <button class="mt-4" @click="editing = false; form.reset(); form.clearErrors()">Abbrechen</button>

                    </div>

                </form>


                <ArticleButton :artikel="artikel" :liste="liste" v-else class="text-sm text-gray-900">{{ artikel.name }}
                </ArticleButton>
                <Dropdown>

                    <template #trigger>

                        <button>

                            <div class="text-end">
                                <span class="text-gray-800">{{ artikel.user.name }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ dayjs(artikel.created_at).fromNow() }}</small>
                                <small v-if="artikel.created_at !== artikel.updated_at" class="text-sm text-gray-600">
                                    &middot;
                                    bearbeitet</small>
                            </div>

                        </button>

                    </template>

                    <template #content>
                        <button
                            class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:bg-gray-100 transition duration-150 ease-in-out"
                            @click="editing = true">

                            Bearbeiten

                        </button>
                        <DropdownLink as="button" :href="route('liste.artikel.destroy', [liste.id, artikel.id])"
                            method="delete">

                            Löschen

                        </DropdownLink>
                    </template>

                </Dropdown>
            </div>




        </div>
    </div>
</template>