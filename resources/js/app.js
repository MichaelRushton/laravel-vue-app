import { createInertiaApp } from "@inertiajs/vue3";
import Default from "./layouts/Default.vue";

createInertiaApp({
    nonce: document.querySelector('meta[name="csp_nonce"]').content,
    layout: () => Default,
});
