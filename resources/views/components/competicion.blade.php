<section class="w-full bg-[#3B9D36] py-9">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8 px-6">
        <div class="lg:col-span-3 flex flex-col gap-6">
            <div class="max-w-[952px] mx-auto w-full">
                @props(['competicion'])
                <!-- Nombre de Competicion -->
                <div class="flex flex-col items-center">
                    <h2 class="text-3xl text-white font-bold">
                        {{ $competicion->Nombre }}
                    </h2>
                    <hr class="w-full border border-white mt-2">
                </div>
                <!-- Descripcion de Competicion -->
                <div class="flex flex-col md:flex-row items-center gap-6 md:gap-10 mt-6">
                    <img src="{{ asset('storage/'.$competicion->Logo) }}" alt="Logo de la {{ $competicion->Nombre }}" class="w-40 md:w-56 lg:w-64 object-contain">
                    <p class="w-full text-white text-sm md:text-base leading-relaxed text-center md:text-left">
                        {{ $competicion->Descripcion }}
                </div>
            </div>
        </div>

        <!-- Anuncio -->
        <aside class="hidden lg:block">
            <div class="sticky top-24 bg-white rounded-xl shadow-lg p-4
                        flex items-center justify-center h-80">
                <span class="text-gray-500 text-sm">Anuncio</span>
            </div>
        </aside>
    </div>
</section>
