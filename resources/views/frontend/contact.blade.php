@extends('frontend.home.master')
@section('content')
<section class="contact-section">
        <div class="container">
            <h2>Contact Us</h2>
            <p>Feel free to drop us a message below.</p>
            <form class="contact-form" action="#" method="post">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <input type="text" name="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="Your Message" rows="6" required></textarea>
                </div>
                <button type="submit" class="btn-submit">Send Message</button>
            </form>
        </div>
    </section>
@endsection