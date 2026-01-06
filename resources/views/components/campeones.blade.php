<section class="w-full bg-[#3B9D36] py-9">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8">

        <!-- CONTENIDO PRINCIPAL -->
        <div class="lg:col-span-3 flex flex-col gap-6">

            <!-- TÍTULO -->
            <div class="flex flex-col items-center">
                <h2 class="text-3xl text-white font-bold">Campeones</h2>
                <hr class="w-[95%] border border-white mt-2">
            </div>

            <!-- BUSCADOR -->
            <form class="ml-6 flex flex-col md:flex-row gap-4 items-center">

                <!-- Buscar texto -->
                <div class="relative w-full md:w-1/3">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"/>
                    </svg>
                    <input class="w-full h-11 pl-10 pr-4 rounded-lg border border-black border-[2px]" placeholder="Buscar...">
                </div>

                <!-- País / Confederación -->
                <select class="w-full md:w-1/4 h-11 px-4 rounded-lg border border-black border-[2px]">
                    <option value="">País / Confederación</option>
                    <option value="inglaterra">Inglaterra</option>
                    <option value="uefa">UEFA</option>
                    <option value="conmebol">CONMEBOL</option>
                    <option value="concacaf">CONCACAF</option>
                </select>

                <!-- Ordenar -->
                <select class="w-full md:w-1/5 h-11 px-4 rounded-lg border border-black border-[2px]">
                    <option value="">Ordenar por</option>
                    <option value="nombre">Primera Temporada</option>
                    <option value="anio">Última Temporada</option>
                </select>

                <!-- Botón Descargar -->
                <button type="button" class="w-full md:w-auto h-11 bg-white px-4 rounded-lg font-semibold 
                        transition flex items-center justify-center border border-black border-[2px]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4"/>
                    </svg>
                </button>
            </form>
        </div>

        <!-- SIDEBAR ANUNCIOS -->
        <aside class="hidden lg:block">
            <div class="sticky top-24 bg-white rounded-xl shadow-lg p-4 flex items-center justify-center h-80">
                <span class="text-gray-500 text-sm">Anuncio</span>
            </div>
        </aside>

    </div>
</section>
