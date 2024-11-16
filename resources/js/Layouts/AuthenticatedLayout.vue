<script setup>
    import AdministratorLayout from '@/Layouts/AdministratorLayout.vue';
    import EnterpriseLayout from '@/Layouts/EnterpriseLayout.vue';
    import GuardLayout from '@/Layouts/GuardLayout.vue';
</script>

<template>
    <div v-if="$page.props.auth.user.user_type == 'Administrador'">
        <AdministratorLayout>
            <slot></slot>
        </AdministratorLayout>
    </div>
    <div v-else-if="$page.props.auth.user.user_type == 'Empresa'">
        <EnterpriseLayout>
            <slot></slot>
        </EnterpriseLayout>
    </div>
    <div v-else-if="$page.props.auth.user.user_type == 'Guardia'">
        <GuardLayout>
            <slot></slot>
        </GuardLayout>
    </div>
</template>
