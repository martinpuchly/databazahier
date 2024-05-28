<template>

    <div class="row">
        <div class="col-md-3">
            <div v-if="$page.props.auth?.user">
                <div>
                    USER:
                    {{ $page.props.auth.user.email }}   
                </div>
                <div>
                    USER_ID:
                    {{ $page.props.auth.user.id }}   
                </div>
                <div>
                    <Link :href="route('logout')" method="POST" >odhlásiť</Link>
                </div>
            </div>
            <div v-else>
                <Link :href="route('login')"  >prihlasit</Link>
            </div>
        </div>

        <div class="col-md-9">
            <Messages/>
            <slot />
        </div>

    </div>

               



</template>




<script setup>
    import ApplicationLogo from '@/Components/ApplicationLogo.vue';
    import { Link } from '@inertiajs/vue3';
    import Messages from '@/Shared/Messages.vue'

</script>