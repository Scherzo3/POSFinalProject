<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>POS Desk</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main class="welcome-page">
        <nav class="welcome-nav" aria-label="Main navigation">
            <a href="{{ url('/') }}" class="app-brand">
                <span>POS <span class="app-brand__light">Project</span></span>
            </a>
            <div class="welcome-nav__links">
                @auth
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if(Route::has('register'))
                        <a class="app-button app-button--primary" href="{{ route('register') }}">Create account</a>
                    @endif
                @endauth
            </div>
        </nav>

        <section class="welcome-hero">
            <div class="welcome-hero__copy">
                <p class="welcome-hero__eyebrow">IT0049 • WEB SYSTEM TECHNOLOGIES</p>
                <h1>Point-of-sale system.</h1>
                <p class="welcome-hero__description">
                    Manage products, customers, and sales in one straightforward place.
                </p>
                <div class="welcome-hero__actions">
                    @auth
                        <a class="app-button app-button--primary" href="{{ route('dashboard') }}">Go to dashboard</a>
                    @else
                        <a class="app-button app-button--primary" href="{{ route('login') }}">Log in to your store</a>
                        @if(Route::has('register'))
                            <a class="app-button app-button--secondary" href="{{ route('register') }}">Create account</a>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="welcome-visual" aria-hidden="true">
                <div class="welcome-visual__panel">
                    <div class="welcome-visual__top">
                        <div class="welcome-visual__dots"><span></span><span></span><span></span></div>
                        <span class="welcome-visual__label">Today's checkout</span>
                    </div>
                    <div class="welcome-visual__receipt">
                        <h2>Sale summary</h2>
                        <div class="welcome-visual__line"><span>Everyday essentials</span><strong>2 items</strong></div>
                        <div class="welcome-visual__line"><span>Fresh goods</span><strong>1 item</strong></div>
                        <div class="welcome-visual__line"><span>Customer</span><strong>Walk-in</strong></div>
                        <div class="welcome-visual__total"><span>Total</span><strong>₱1,250.00</strong></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
