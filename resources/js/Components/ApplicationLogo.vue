<script setup>
    import VuePdfEmbed from 'vue-pdf-embed';

    const logoSource = '/logo';
</script>

<template>
    <VuePdfEmbed :source="logoSource" :width="160" />
</template>
