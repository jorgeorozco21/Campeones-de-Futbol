<header class="w-full bg-[#0B3D02] text-white shadow-md fixed top-0 left-0 z-40 ">
    <div class="max-w-7xl mx-auto px-4 py-4 grid grid-cols-3 items-center">
        <!-- Menu -->
        <div class="flex justify-start">
            <button id="menuBtn" class="focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Logo de la Pagina -->
        <div class="text-center text-xl font-extrabold tracking-wide">
            Fútbol Histórico
        </div>

        <!-- Buscador -->
        <div class="flex justify-end">
            <div class="relative w-32 sm:w-40 md:w-56">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"/>
                </svg>
                <input type="text" placeholder="Buscar..." class="w-full h-9 pl-9 pr-3 rounded-lg text-black text-sm focus:outline-none">
            </div>
        </div>
    </div>
</header>

<!-- Menu -->
<div id="mobileMenu" class="fixed top-0 left-0 h-full w-72 bg-[#0B3D02] text-white transform -translate-x-full transition-transform duration-300
            z-50 p-6 shadow-xl">
    <button id="closeMenu" class="mb-6 text-xl">✕</button>
    <nav class="flex flex-col gap-6 text-sm font-semibold">
        <!-- Organizacion -->
        <div>
            <p class="opacity-70 mb-2">Organización</p>
            <div class="flex flex-col gap-2">
                <a href="#" class="hover:opacity-80">FIFA</a>
            </div>
        </div>

        <!-- Confederaciones -->
        <div>
            <p class="opacity-70 mb-2">Confederaciones</p>
            <div class="flex flex-col gap-2">
                <a href="#" class="hover:opacity-80">UEFA</a>
                <a href="#" class="hover:opacity-80">CONMEBOL</a>
                <a href="#" class="hover:opacity-80">CONCACAF</a>
                <a href="#" class="hover:opacity-80">AFC</a>
                <a href="#" class="hover:opacity-80">CAF</a>
                <a href="#" class="hover:opacity-80">OFC</a>
            </div>
        </div>

        <!-- Premios -->
        <div>
            <p class="opacity-70 mb-2">Premios Individuales</p>
            <div class="flex flex-col gap-2">
                <a href="#" class="hover:opacity-80">Balón de Oro</a>
                <a href="#" class="hover:opacity-80">The Best</a>
                <a href="#" class="hover:opacity-80">Bota de Oro</a>
                <a href="#" class="hover:opacity-80">Golden Boy</a>
            </div>
        </div>

    </nav>
</div>

<script>
    const menuBtn = document.getElementById('menuBtn');
    const closeMenu = document.getElementById('closeMenu');
    const mobileMenu = document.getElementById('mobileMenu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('-translate-x-full');
    });

    closeMenu.addEventListener('click', () => {
        mobileMenu.classList.add('-translate-x-full');
    });
</script>
