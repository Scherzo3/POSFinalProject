<x-app-layout>
    <div class="app-page">
        <div class="app-page__heading">
            <div>
                <h1>Sales history</h1>
                <p>Review completed transactions from your store.</p>
            </div>
            <a class="app-button app-button--primary" href="{{ route('sales.create') }}">New sale</a>
        </div>

        <section class="app-card">
            @if($sales->isEmpty())
                <div class="app-empty">
                    No sales recorded yet. Create a sale to see it listed here.
                </div>
            @else
                <div class="app-table-wrap">
                    <table class="app-table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Staff</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales as $sale)
                                <tr>
                                    <td class="font-semibold">{{ $sale->customer?->full_name ?? 'Customer removed' }}</td>
                                    <td>{{ $sale->product?->name ?? 'Product removed' }}</td>
                                    <td>{{ number_format($sale->quantity) }}</td>
                                    <td class="font-semibold">₱{{ number_format($sale->total_price, 2) }}</td>
                                    <td>{{ $sale->user?->name ?? '—' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>
    </div>
</x-app-layout>
