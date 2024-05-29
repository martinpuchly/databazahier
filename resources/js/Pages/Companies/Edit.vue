<script setup>
    import AppLayout from '@/Layouts/AppLayout'
    import { Head, useForm  } from '@inertiajs/vue3'
    import Form from './Form.vue'

    defineProps(
        { 
            company: Object 
            errors: Object
        }
    )
    defineOptions({ layout: AppLayout })

    const form = useForm({
        title: props.company.title,
        logo: props.company.logo,
        place: props.company.place,
        info: props.company.info,
        is_publisher: props.company.is_publisher,
        is_developer: props.company.is_developer,
    })

    const submit = () => {
        form.patch(route('admin.company.edit', props.company.id ));
    };

    const destroy = id => {
        if(confirm('Skutočne chcete vymazať túto spoločnosť?')){
            router.delete(route('admin.company.delete', props.company.id))
        }
    }
</script>



<template>
    <title>Admin - Spoločnosti</title>
    <h1>Upraviť spoločnosť</h1>

    <h2>{{ company.title }}</h2>
    <form @submit.prevent="submit">
        <Form form="form" :errors="errors" ></Form>
        <button type="submit" :disabled="form.processing">Login</button>
    </form>
    <a  v-if="$page.props.auth.permissions.includes('company-delete')" @click.prevent="destroy(company.id)" method="delete" class="btn btn-sm btn-danger">vymazať</a>

</template>