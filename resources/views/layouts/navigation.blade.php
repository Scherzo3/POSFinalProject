<nav x-data="{ open: false }" class="app-nav">
    <div class="app-nav__inner">
        <div class="app-nav__main">
            <a href="{{ route('dashboard') }}" class="app-brand">
                <span>POS <span class="app-brand__light">Project</span></span>
            </a>

            <div class="app-nav__links">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    Dashboard
                </x-nav-link>
                <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
                    Products
                </x-nav-link>
                <x-nav-link :href="route('customers.index')" :active="request()->routeIs('customers.*')">
                    Customers
                </x-nav-link>
                <x-nav-link :href="route('sales.index')" :active="request()->routeIs('sales.*')">
                    Sales
                </x-nav-link>
            </div>
        </div>

        <div class="app-nav__account">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="app-account-button" type="button">
                        <span class="app-account-button__avatar">{{ mb_substr(Auth::user()->name, 0, 1) }}</span>
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.51a.75.75 0 01-1.08 0l-4.25-4.51a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">Profile settings</x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="app-dropdown-logout" type="submit">Log out</button>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>

        <button class="app-nav__toggle" type="button" @click="open = ! open" :aria-expanded="open" aria-label="Toggle navigation">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <div x-show="open" x-transition class="app-nav__mobile">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-responsive-nav-link>
        <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">Products</x-responsive-nav-link>
        <x-responsive-nav-link :href="route('customers.index')" :active="request()->routeIs('customers.*')">Customers</x-responsive-nav-link>
        <x-responsive-nav-link :href="route('sales.index')" :active="request()->routeIs('sales.*')">Sales</x-responsive-nav-link>
        <x-responsive-nav-link :href="route('profile.edit')">Profile settings</x-responsive-nav-link>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="app-mobile-logout">Log out</button>
        </form>
    </div>
</nav>
