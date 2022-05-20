<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeSuccess from '@/Components/Alert/Success.vue';
import BreezeTextarea from '@/Components/Textarea.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    name: '',
    email: '',
    message: '',
});

defineProps({
  success: {
    type: String,
    default: null
  }
})

const submit = () => {
    form.post(route('contact-us'));
};

const reset = () => {
  location.reload();
}
</script>

<template>
    <BreezeGuestLayout>
        <!-- <Head title="Contact Us" /> -->
        <div class="text-2xl text-center">Contact Us</div>
        <BreezeValidationErrors class="mb-4" />
        <div v-if="success">
            <BreezeSuccess :success="success" />
            <div class="flex items-center justify-end mt-4">
                <BreezeButton class="ml-4" @click="reset">
                    Send Again
                </BreezeButton>
            </div>
        </div>
        <form @submit.prevent="submit" v-else>
            <div>
                <BreezeLabel for="name" value="Name" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus
                    autocomplete="name" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="email" value="Email" />
                <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email"
                    autocomplete="username" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="message" value="Message" />
                <BreezeTextarea id="message" class="mt-1 block w-full" v-model="form.message" autocomplete="message" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Submit
                </BreezeButton>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
