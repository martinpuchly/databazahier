<script setup>
    import AppLayout from '@/Layouts/AppLayout'
    import { Head, useForm  } from '@inertiajs/vue3'
    import Form from './Form.vue'

    defineProps(
        { 
            companies: Object 
            errors: Object
        }
    )
    defineOptions({ layout: AppLayout })

    const form = useForm({
        title: null,
        logo: null,
        place: null,
        info: null,
        is_publisher: true,
        is_developer: true,
    })

    const submit = () => {
        form.post(route('admin.company.add'), {
            onFinish: () => {
                form.reset()
            },
        });
    };

</script>



<template>
    <title>Admin - Spoločnosti</title>
    <h1>Spoločnosti</h1>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Názov</th>
                <th>Vydavateľ</th>
                <th>Vývojár</th>
                <th>Možnosti</th>
            </tr>
        </thead>
        <tbody>
            <tr for="company in companies" :key="company.id">
                <td>{{ company.id }}</td>
                <td>{{ company.name }}</td>
                <td>{{ company.is_publisher }}</td>
                <td>{{ company.is_developer }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <Link  v-if="$page.props.auth.permissions.includes('company-edit')" :href="route('admin.company.edit', group.id)" title="upraviť skupinu" class="btn btn-sm btn-success">
                            upraviť
                        </Link>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <h2>Pridať spoločnosť</h2>
    <form @submit.prevent="submit">
        <Form form="form" :errors="errors"></Form>
        <button type="submit" :disabled="form.processing">Login</button>
    </form>
</template>