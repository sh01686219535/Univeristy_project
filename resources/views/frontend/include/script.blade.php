    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    {{-- {!! ToastMagic::scripts() !!} --}}
    <script>
        let index = 0;
        const slides = document.querySelectorAll(".slide");
        const dots = document.querySelectorAll(".dot");
        const track = document.querySelector(".slider-track");

        function showSlide() {
            index++;
            if (index >= slides.length) index = 0;

            const slideWidth = slides[0].offsetWidth + 30; // width + margin
            track.style.transform = `translateX(-${index * slideWidth}px)`;

            dots.forEach(dot => dot.classList.remove("active"));
            dots[index].classList.add("active");

            setTimeout(showSlide, 4000);
        }

        showSlide();
    </script>
    @stack('js')
    </body>

    </html>
