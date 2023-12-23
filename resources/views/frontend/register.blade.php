@extends('layouts.frontend')
@section('title', 'Register')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Register</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Register</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Register Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Register</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                    <x-jet-validation-errors class="mb-4" />
                </div>
            </div>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="name" placeholder="Your name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="email" name="email" placeholder="Your email">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="password" name="password" placeholder="Your password">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="password" name="password_confirmation" placeholder="Confirmation password">
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="site-btn">REGISTER</button>
                        <div class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->
@endsection
