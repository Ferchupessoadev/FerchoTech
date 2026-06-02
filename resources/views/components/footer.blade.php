<footer class="bg-gray-950 text-gray-400 pt-16 pb-8 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">

        <div class="col-span-1 md:col-span-1">
            <h2 class="text-2xl font-bold text-white mb-4">
                Fercho <span class="text-blue-500">Tech</span>
            </h2>
            <p class="text-sm leading-relaxed mb-6">
                Soluciones integrales en tecnología, soporte técnico y desarrollo digital para potenciar tu negocio o proyecto personal.
            </p>
            <div class="flex space-x-4">
                <a href="https://www.instagram.com/ferchosistemas/" target="_blank" class="hover:text-pink-500 transition-colors">
                    <i data-lucide="instagram" class="w-5 h-5"></i>
                </a>
                <a href="#" class="hover:text-blue-400 transition-colors">
                    <i data-lucide="linkedin" class="w-5 h-5"></i>
                </a>
                <a href="#" class="hover:text-gray-100 transition-colors">
                    <i data-lucide="github" class="w-5 h-5"></i>
                </a>
            </div>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-4 uppercase text-xs tracking-widest">Navegación</h3>
            <ul class="space-y-2 text-sm">
                <li><a href={{ route('home') }} class="hover:text-blue-500 transition">Inicio</a></li>
                <li><a href={{ route('services') }} class="hover:text-blue-500 transition">Servicios</a></li>
                <li><a href={{ route('contact') }} class="hover:text-blue-500 transition">Contacto</a></li>
                <li><a href={{ route('login') }} class="hover:text-blue-500 transition italic text-gray-500">Acceso Staff</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-4 uppercase text-xs tracking-widest">Servicios</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-blue-500 transition">Soporte Técnico</a></li>
                <li><a href="#" class="hover:text-blue-500 transition">Desarrollo Web</a></li>
                <li><a href="#" class="hover:text-blue-500 transition">Mantenimiento de Redes</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-4 uppercase text-xs tracking-widest">Contacto</h3>
            <ul class="space-y-3 text-sm">
                <li class="flex items-center">
                    <i data-lucide="mail" class="w-4 h-4 mr-3 text-blue-500"></i>
                    contact@ferchudev.com
                </li>
                <li class="flex items-center">
                    <i data-lucide="map-pin" class="w-4 h-4 mr-3 text-blue-500"></i>
                    Concordia, Entre Ríos
                </li>
                <li class="flex items-center">
                    <i data-lucide="clock" class="w-4 h-4 mr-3 text-blue-500"></i>
                    Lun - Vie: 9:00 - 18:00
                </li>
            </ul>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 mt-16 pt-8 border-t border-gray-900 flex flex-col md:row justify-between items-center text-xs">
        <p>&copy; 2026 Fercho Sistemas. Todos los derechos reservados.</p>
        <p class="mt-2 md:mt-0 italic">Hecho con ❤️ y Laravel 12</p>
    </div>
</footer>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
