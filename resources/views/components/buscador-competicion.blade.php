<section class="w-full max-w-5xl mx-auto pt-8">
    <!-- Título de la sección -->
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-white">Filtrar Competencias</h2>
        <p class="text-sm text-white/80 mt-1">Busca por nombre, país o tipo de torneo</p>
    </div>

    <!-- Filtros de competiciones -->
    <!-- Filtros de competiciones -->
<form class="w-full max-w-[992px] mx-auto flex flex-nowrap gap-3 items-center overflow-x-auto pb-6 mb-4">
    
    <!-- Buscador -->
    <div class="relative min-w-[220px] flex-grow md:flex-grow-0 md:w-1/3">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-500"
            fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"/>
        </svg>
        <input class="w-full h-10 pl-10 pr-4 rounded-lg border-1 border-black focus:outline-none focus:ring-2 focus:ring-white/50"
            placeholder="Buscar..." name="search">
    </div>

    <!-- Select de País -->
    <select class="min-w-[180px] h-10 px-3 rounded-lg border-1 border-black bg-white font-medium" name="pais">
        <option value="">País</option>
        <option value="inglaterra">Inglaterra</option>
        <option value="alemania">Alemania</option>
        <option value="francia">Francia</option>
    </select>

    <!-- Select de Tipo de torneo -->
    <select class="min-w-[180px] h-10 px-3 rounded-lg border-1 border-black bg-white font-medium" name="tipo">
        <option value="">Tipo de torneo</option>
        <option value="liga">Liga</option>
        <option value="copa">Copa</option>
        <option value="supercopa">Supercopa</option>
    </select>

    <!-- Select de Ordenar -->
    <select class="min-w-[160px] h-10 px-3 rounded-lg border-1 border-black bg-white font-medium md:ml-auto" name="orden">
        <option value="">Ordenar por</option>
        <option value="inicio-actualidad">Inicio-Actualidad</option>
        <option value="actualidad-inicio">Actualidad-Inicio</option>
    </select>

</form>

</section>
