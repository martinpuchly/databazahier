<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-show="message">
        <p class="text-danger fw-semibold">
            {{ message }}
        </p>
    </div>
</template>
