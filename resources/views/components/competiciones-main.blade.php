<section class="conf-section w-full max-w-7xl mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold text-white">FIFA</h2>
        <a href="" class="text-sm font-semibold text-white hover:underline">
            Ver más →
        </a>
    </div>
    <!-- Slider de Competiciones -->
    <div class="flex items-center gap-4">
        <!-- Flecha Izquierda -->
        <button class="slider-prev hidden bg-white text-black w-9 h-9 rounded-full shadow flex items-center justify-center shrink-0">
            ‹
        </button>
        <div class="slider flex gap-4 overflow-x-hidden scroll-smooth w-full">
            <!-- Card de Competicion -->
            <div class="w-[140px] h-[120px] bg-white rounded-lg shadow-sm flex flex-col items-center p-3">
                <img src="images/premier_league.webp"
                     class="w-14 h-14 object-contain mb-2">
                <span class="text-xs font-semibold text-center leading-tight h-[32px] flex items-start justify-center overflow-hidden">
                    UEFA Champions League
                </span>
            </div>
        </div>
        <!-- Flecha Derecha -->
        <button class="slider-next bg-white text-black w-9 h-9 rounded-full shadow flex items-center justify-center shrink-0">
            ›
        </button>
    </div>
</section>

<script>
    document.querySelectorAll('.conf-section').forEach(section => {
        const slider = section.querySelector('.slider');
        const prevBtn = section.querySelector('.slider-prev');
        const nextBtn = section.querySelector('.slider-next');
        const scrollAmount = 160;

        function updateArrows() {
            const maxScroll = slider.scrollWidth - slider.clientWidth;

            prevBtn.classList.toggle('hidden', slider.scrollLeft <= 0);
            nextBtn.classList.toggle('hidden', slider.scrollLeft >= maxScroll - 5);
        }

        prevBtn.addEventListener('click', () => {
            slider.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });

        nextBtn.addEventListener('click', () => {
            slider.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });

        slider.addEventListener('scroll', updateArrows);
        window.addEventListener('load', updateArrows);
    });
</script>
