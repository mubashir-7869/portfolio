@extends('layouts.frontend.app')
@push('header')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="header">
        <div class="container">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse"
                        data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand scroll-top">
                        <div class="logo"></div>
                    </a>
                </div>
                <!--/.navbar-header-->
                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#" class="scroll-top">Home</a></li>
                        <li><a href="#" class="scroll-link" data-id="about">About Us</a></li>
                        <li><a href="#" class="scroll-link" data-id="portfolio">Portfolio</a></li>
                        <li><a href="#" class="scroll-link" data-id="blog">Blog</a></li>
                        <li><a href="#" class="scroll-link" data-id="contact">Contact Us</a></li>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
            </nav>
        </div>
    </div>

    @include('pages.frontend.home')
    @include('pages.frontend.about')
    @include('pages.frontend.portfolio')
    @include('pages.frontend.blog')

    <div id="contact" class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h4>Contact Us</h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 mx-auto">
                    <div class="row">
                        <form id="contact-form">
                            @csrf
                            <div class="col-md-6">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Your name..." required>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <input name="email" type="email" class="form-control" id="email"
                                        placeholder="Your email..." required>
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message"
                                        placeholder="Your message..." required></textarea>
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Send Message</button>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2017 Company Name - Design: <a href="http://www.tooplate.com/view/2089-meteor" target="_parent">Meteor</a></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <ul>
                            @if ($socialLinks)
                                @foreach ($socialLinks as $socialLink)
                                    <li><a href="{{ $socialLink->link }}" target="blank"><i class="{{ $socialLink->icon }}"></i></a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle form submission
            $('#contact-form').submit(function(e) {
                e.preventDefault();
                
                const form = $(this);
                const formData = form.serialize(); // Serialize all form data

                // Show loading indicator
                $('#form-submit').prop('disabled', true).text('Sending...');

                $.ajax({
                    url: '{{ route('contact.message.store') }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        // Reset the button and form
                        $('#form-submit').prop('disabled', false).text('Send Message');

                        // Handle success response
                        if (response.status === 'success') {
                            Swal.fire({
                                position: 'center',
                                title: response.message,
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2500
                            }).then(() => {
                                form[0].reset(); // Reset the form
                            });
                        } else {
                            // Handle error response
                            Swal.fire({
                                position: 'center',
                                title: response.message,
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 2500
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        // Reset the button and handle error
                        $('#form-submit').prop('disabled', false).text('Send Message');
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Something went wrong. Please try again later.',
                            showConfirmButton: false,
                            timer: 4500
                        });
                    }
                });
            });
        });
    </script>
@endpush
