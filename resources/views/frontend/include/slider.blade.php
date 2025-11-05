<section class="slider">
    <div class="slider-track">
        @foreach ($propertySlider as $slider)
            <div class="slide">
               <a href="{{ route('property.details', $slider->id) }}">
                 <img src="{{ asset($slider->image) }}">
                <div class="text">
                    <h5>{{ $slider->title }}</h4>
                        <p><b>Price : {{ $slider->price }} Taka</b></p>
                        <p>Address : {{ $slider->location }}</p>
                </div>
               </a>
            </div>
        @endforeach
        {{-- <div class="slide">
            <img src="{{ asset('frontendAsset/slider_image/9.jpg') }}">
            <div class="text">Caption One</div>
        </div>
        <div class="slide">
            <img src="{{ asset('frontendAsset/slider_image/10.jpg') }}">
            <div class="text">Caption Two</div>
        </div>
        <div class="slide">
            <img src="{{ asset('frontendAsset/slider_image/12.jpg') }}">
            <div class="text">Caption Three</div>
        </div>
        <div class="slide">
            <img src="{{ asset('frontendAsset/slider_image/21.jpg') }}">
            <div class="text">Caption Four</div>
        </div>
        <div class="slide">
            <img src="{{ asset('frontendAsset/slider_image/24.jpg') }}">
            <div class="text">Caption Five</div>
        </div>
        <div class="slide">
            <img src="{{ asset('frontendAsset/slider_image/25.jpg') }}">
            <div class="text">Caption Six</div>
        </div> --}}
    </div>
    <div class="dots">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</section>
