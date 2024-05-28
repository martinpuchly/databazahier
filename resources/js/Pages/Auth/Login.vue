<script setup>
    import Checkbox from '@/Components/Checkbox.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';

    defineProps({
        canResetPassword: {
            type: Boolean,
        },
        status: {
            type: String,
        },
    });

    const form = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const submit = () => {
        form.post(route('login'), {
            onFinish: () => form.reset('password'),
        });
    };
</script>

<template>
    <AppLayout>
        <Head title="prihlásiť" />

        <div class="row">
            <div class="col-md-6">
                <h1>Prihlásiť</h1>
                <form @submit.prevent="submit">
                    <div>
                        <label for="email" class="form-label mb-0">Emailová adresa</label>
                        <input id="email" type="email" class="form-control" v-model="form.email" required autofocus autocomplete="email">
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <label for="password" class="form-label mb-0">Heslo</label>
                        <input id="password" type="password" class="form-control" v-model="form.password" required autocomplete="current-password">
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="block mt-4">
                        <label class="flex items-center">
                            <input class="form-check-input" type="checkbox" id="remember" v-model="form.remember">
                            <label class="form-check-label mx-2" for="remember">
                                zapamätať si prihlásenie
                            </label>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button class="btn btn-primary mx-4"  :class="{'opacity-25': form.processing }" :disabled="form.processing">
                            Prihlásiť
                        </button>
                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="mx-2"
                            >
                            Zabudol si heslo?
                        </Link>
                        |
                        <Link
                            :href="route('register')"
                            class="mx-2"
                            >
                            Registrácia
                        </Link>
                    </div>
                </form>
            </div>
        </div>

        
    </AppLayout>
</template>
