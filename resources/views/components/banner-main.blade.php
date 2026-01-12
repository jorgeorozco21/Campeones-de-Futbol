<section class="relative w-full overflow-hidden">
    <!-- Carrusel -->
    <div class="relative h-[180px] sm:h-[240px] md:h-[320px] lg:h-[420px] overflow-hidden">
        <!-- Banners -->
        <div id="banner"
            class="flex h-full transition-transform duration-700 ease-in-out">
            <!-- Banner 1 -->
            <div class="min-w-full h-full">
                <img src="{{ asset('images/banner/banner_4.png') }}" class="w-full h-full object-cover">
            </div>

            <!-- Banner 2 -->
            <div class="min-w-full h-full">
                <img src="{{ asset('images/banner/banner_4.png') }}" class="w-full h-full object-cover">
            </div>

            <!-- Banner 3 -->
            <div class="min-w-full h-full">
                <img src="{{ asset('images/banner/banner_4.png') }}" class="w-full h-full object-cover">
            </div>

        </div>
    </div>

    <!-- Indicadores -->
    <div class="absolute bottom-3 sm:bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
        <button class="dot w-2.5 h-2.5 rounded-full bg-[#0B3D02] opacity-100"></button>
        <button class="dot w-2.5 h-2.5 rounded-full bg-[#0B3D02] opacity-50"></button>
        <button class="dot w-2.5 h-2.5 rounded-full bg-[#0B3D02] opacity-50"></button>
    </div>
</section>

<script>
    const track = document.getElementById('banner');
    const dots = document.querySelectorAll('.dot');
    const totalSlides = dots.length;

    let current = 0;
    const intervalTime = 5000;

    function showSlide(index) {
        track.style.transform = `translateX(-${index * 100}%)`;

        dots.forEach((dot, i) => {
            dot.classList.toggle('opacity-100', i === index);
            dot.classList.toggle('opacity-50', i !== index);
        });

        current = index;
    }

    function nextSlide() {
        const next = (current + 1) % totalSlides;
        showSlide(next);
    }

    let autoSlide = setInterval(nextSlide, intervalTime);

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            clearInterval(autoSlide);
            showSlide(index);
            autoSlide = setInterval(nextSlide, intervalTime);
        });
    });
</script>
