<x-app-layout>
    <div class="app-page">
        <div class="app-page__heading">
            <div>
                <h1>Dashboard</h1>
                <p>A quick overview of your store.</p>
            </div>
            <a class="app-button app-button--primary" href="{{ route('sales.create') }}">Create a sale</a>
        </div>

        <section class="app-stats" aria-label="Store totals">
            <article class="app-stat">
                <p class="app-stat__label">Products</p>
                <p class="app-stat__value">{{ number_format($totalProducts) }}</p>
            </article>
            <article class="app-stat">
                <p class="app-stat__label">Customers</p>
                <p class="app-stat__value">{{ number_format($totalCustomers) }}</p>
            </article>
            <article class="app-stat">
                <p class="app-stat__label">Sales recorded</p>
                <p class="app-stat__value">{{ number_format($totalSales) }}</p>
            </article>
            <article class="app-stat">
                <p class="app-stat__label">Total revenue</p>
                <p class="app-stat__value">₱{{ number_format($totalRevenue, 2) }}</p>
            </article>
        </section>

        <section class="app-dashboard-links" aria-label="Store management">
            <a class="app-button app-button--secondary" href="{{ route('products.index') }}">Manage products</a>
            <a class="app-button app-button--secondary" href="{{ route('customers.index') }}">Manage customers</a>
            <a class="app-button app-button--secondary" href="{{ route('sales.index') }}">View sales history</a>
        </section>
    </div>
</x-app-layout>
