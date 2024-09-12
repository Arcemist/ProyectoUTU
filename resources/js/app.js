import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import VCalendar from 'v-calendar';
import 'v-calendar/style.css';

//import '@mdi/font/css/materialdesignicons.css';
//import 'vuetify/styles';
import { createVuetify } from 'vuetify/lib/framework.mjs';
import * as vuetifyComponents from 'vuetify/components';
import * as vuetifyDirectives from 'vuetify/directives';

const vuetify = createVuetify({
    vuetifyComponents,
    vuetifyDirectives,
})

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(vuetify)
            .use(VCalendar)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
