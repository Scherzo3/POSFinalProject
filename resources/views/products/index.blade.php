<x-app-layout>
    <div class="app-page">
        <div class="app-page__heading">
            <div>
                <h1>Products</h1>
                <p>Keep your catalog and stock levels up to date.</p>
            </div>
            <a class="app-button app-button--primary" href="{{ route('products.create') }}">Add product</a>
        </div>

        <section class="app-card">
            @if($products->isEmpty())
                <div class="app-empty">
                    No products yet. Add your first product to start building your catalog.
                </div>
            @else
                <div class="app-table-wrap">
                    <table class="app-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="font-semibold">{{ $product->name }}</td>
                                    <td>₱{{ number_format($product->price, 2) }}</td>
                                    <td>
                                        <span class="app-badge">{{ number_format($product->stock_quantity) }} in stock</span>
                                    </td>
                                    <td>
                                        @if($product->image)
                                            <img class="app-table__image" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                        @else
                                            <span class="text-sm text-gray-400">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="app-table__actions">
                                            <a class="app-text-button" href="{{ route('products.edit', $product->id) }}">Edit</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="app-text-button app-text-button--danger" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>
    </div>
</x-app-layout>
