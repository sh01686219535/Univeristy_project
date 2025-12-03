@extends('frontend.home.master')
@section('content')
    <section class="contact-section">
        <div class="container">
            <h2>Contact Us</h2>
            <p>Feel free to drop us a message below.</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="contact-form" action="{{ route('contact.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Your Email" >
                </div>
                <div class="form-group">
                    <input type="text" name="phone" placeholder="Phone" required>
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="Your Message" rows="6"></textarea>
                </div>
                <button type="submit" class="btn-submit">Send Message</button>
            </form>
        </div>
    </section>
@endsection
