<script setup>

    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';

    const form = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    const submit = () => {
        form.post(route('register'), {
            onFinish: () => form.reset('password', 'password_confirmation'),
        });
    };
</script>

<template>
    <AppLayout>
        <Head title="registrácia" />

        <div class="row">
            <div class="col-md-6">
                <h1>Registrácia</h1>
                <form @submit.prevent="submit">
                    <div>
                        <label for="name" class="form-label mb-0">Používateľské meno</label>
                        <input id="name" type="text" class="form-control" v-model="form.name" required autofocus autocomplete="name">
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="mt-4">
                        <label for="email" class="form-label mb-0">Emailová adresa</label>
                        <input id="email" type="email" class="form-control" v-model="form.email" required autofocus autocomplete="email">
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <label for="password" class="form-label mb-0">Heslo</label>
                        <input id="password" type="password" class="form-control" v-model="form.password" required autocomplete="current-password">
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="mt-4">
                        <label for="password_confirmation" class="form-label mb-0">Heslo znovu</label>
                        <input id="password_confirmation" type="password" class="form-control" v-model="form.password_confirmation" required autocomplete="new-password">
                        <InputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <Link :href="route('login')" class="mx-3">
                            Prihlásiť
                        </Link>
                        <button class="btn btn-primary mx-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Registrácia
                        </button>
                    </div>
                </form>

            </div>
        </div>
        
    </AppLayout>
</template>
