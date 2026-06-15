import Alpine from "alpinejs";
import resize from '@alpinejs/resize'

window.Alpine = Alpine;

Alpine.plugin(resize)
Alpine.start();
document.addEventListener("alpine:init", () => {
    Alpine.data("navbar", () => ({
        init() {
            lucide.createIcons();
            this.$watch("sidebarOpen", () => lucide.createIcons());
            this.$watch("menuOpen", () => lucide.createIcons());
        },
    }));
});
