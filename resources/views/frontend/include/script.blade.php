    <!-- jQuery and Toastr JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}

    <!-- Toastr JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    {!! ToastMagic::scripts() !!}
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
    <script>
        const footer = document.querySelector('.fixed-footer');

        window.addEventListener('scroll', () => {
            const scrollTop = window.scrollY;
            const windowHeight = window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight;

            // when user reaches bottom
            if (scrollTop + windowHeight >= documentHeight - 5) {
                footer.classList.add('show');
            } else {
                footer.classList.remove('show');
            }
        });
    </script>
    {{-- //toaster --}}
    {{-- <script>
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            showDuration: 300,
            hideDuration: 1000,
            timeOut: 5000,
            extendedTimeOut: 1000,
            newestOnTop: true,
            preventDuplicates: true
        };

        @if (session()->has('message'))
            const type = "{{ session('alert-type', 'info') }}";
            const message = @json(session('message'));

            switch (type) {
                case 'success':
                    toastr.success(message);
                    break;
                case 'error':
                    toastr.error(message);
                    break;
                case 'warning':
                    toastr.warning(message);
                    break;
                default:
                    toastr.info(message);
            }
        @endif
    </script> --}}


    @stack('js')
    </body>

    </html>
