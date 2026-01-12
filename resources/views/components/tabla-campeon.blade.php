<section class="w-full bg-[#3B9D36] pt-6 pb-6">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8">
        <div class="lg:col-span-3 flex flex-col items-center">
            <div class="flex flex-col items-center mb-4 max-w-[952px] w-full mx-auto">
                <h2 class="text-3xl text-white font-bold text-center lg:text-left">
                    Palmares de la Premier League
                </h2>
                <hr class="w-[95%] border border-white mt-2 mb-2">
                <div class="w-[95%] flex flex-col items-center lg:items-start">
                    <p class="text-white text-center lg:text-left">
                        Aquí se muestra la tabla con el número de campeonatos ganados por cada equipo:
                    </p>
                </div>
            </div>

            <!-- Tabla de Numero de Campeonatos -->
            <div class="overflow-x-auto w-[95%] mx-auto rounded-lg border border-gray-300">
                <table class="w-full text-sm text-left text-black border-collapse bg-white rounded-lg overflow-hidden">
                    <thead class="bg-[#0B3D02] text-white">
                        <tr>
                            <th class="px-4 py-2 rounded-tl-lg">Logo</th>
                            <th class="py-2">Equipo</th>
                            <th class="px-4 py-2">Títulos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @props(['campeones'])
                        @foreach ($campeones as $campeon)    
                            <tr class="border-b border-gray-300 hover:bg-gray-100 transition">
                                <td class="px-4 py-2">
                                    <img src="{{ asset('storage/'.$campeon->Escudo) }}" alt="{{ $campeon->Nombre }}" class="h-10 w-10 object-contain">
                                </td>
                                <td class="py-2">{{ $campeon->Nombre }}</td>
                                <td class="px-4 py-2">{{ $campeon->titulos }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
