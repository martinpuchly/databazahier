<script setup>
    defineProps({
        form: form
    })

</script>

<template>
    <div class="row form-group">
        <div class="col-auto">
            <label for="name" class="form-label">Názov spoločnosti</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" v-model="form.name">
            <div v-if="errors.title" class="text-danger">
                    {{ errors.title }}
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-auto">
            <label for="logo" class="form-label">Logo spoločnosti</label>
        </div>
        <div class="col-auto">
            <input class="form-control" type="file" id="logo" @input="form.logo = $event.target.files[0]">
            <div v-if="errors.logo" class="text-danger">
                    {{ errors.logo }}
            </div>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-auto">
            <label for="place" class="form-label">Sídlo</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" v-model="form.place">
            <div v-if="errors.place" class="text-danger">
                    {{ errors.place }}
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-auto">
            <label for="info" class="form-label">O spoločnosti</label>
        </div>
        <div class="col-auto">
            <textarea type="text" class="form-control" v-model="form.info"></textarea>
            <div v-if="errors.info" class="text-danger">
                    {{ errors.info }}
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-auto">
        </div>
        <div class="col-auto">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" v-model="form.is_publisher">
                <label class="form-check-label" for="flexCheckDefault">
                    vydavateľ
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" v-model="form.is_developer">
                <label class="form-check-label" for="flexCheckDefault">
                    vývojár
                </label>
            </div>
        </div>
    </div>
</template>