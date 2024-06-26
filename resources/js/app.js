import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolveUnit(name),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

function resolveUnit(name)
{
    let parts = name.split('::');
    let componentPath = `./Pages/${name}.vue`;

    // if it's the unit path
    if (parts.length > 1) {
        let unit = parts[0];
        unit = unit.charAt(0).toUpperCase() + unit.slice(1);
        let component = parts[1];
        componentPath = `../../app/Units/${unit}/Resources/js/Pages/${component}.vue`;
    }

    return resolvePageComponent(componentPath, import.meta.glob([
        './Pages/**/*.vue',
        '../../app/Units/**/Resources/js/Pages/**/*.vue'
    ]));
}
