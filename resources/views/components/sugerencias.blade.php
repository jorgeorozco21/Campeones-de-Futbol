<section class="w-full bg-[#3B9D36] py-8">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8">
        <div class="lg:col-span-3 flex flex-col items-center gap-6">
            <div class="flex flex-col items-center max-w-[952px] w-full mx-auto">
                <h2 class="text-3xl text-white font-bold text-center">
                    Competiciones Relacionadas
                </h2>
                <hr class="w-[95%] border border-white mt-2 mb-3">
                <p class="text-white w-[95%] text-center md:text-left">
                    Descubre más competiciones del mismo país o de la misma confederación.
                </p>
            </div>

            <!-- Competiciones del Mismo Pais -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-[95%] max-w-[952px]">
                @props(['sugerencias'])
                @foreach ($sugerencias as $sugerencia)    
                    <a href="#" class="bg-white rounded-xl shadow hover:shadow-lg transition p-4 flex flex-col items-center text-center">
                    <!--<div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4 flex flex-col items-center text-center">-->
                        <img src="{{ asset('storage/'.$sugerencia->Logo) }}" alt="{{ $sugerencia->nombreCompeticion }}" class="h-16 mb-3">
                        <h3 class="font-bold text-lg">{{ $sugerencia->nombreCompeticion }}</h3>
                        <p class="text-sm text-gray-600">{{ $sugerencia->nombrePais }}</p>
                    <!--</div>-->
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
