<x-app-layout>
    <div class="app-page app-page--narrow">
        <div class="app-page__heading">
            <div>
                <h1>Edit product</h1>
                <p>Update product details and inventory.</p>
            </div>
            <a class="app-button app-button--secondary" href="{{ route('products.index') }}">Back to products</a>
        </div>

        <section class="app-card">
            <div class="app-card__body">
                <form action="{{ route('products.update', $product->id) }}" method="POST" class="app-form">
                    @csrf
                    @method('PUT')

                    <div class="app-field">
                        <label for="name">Product name</label>
                        <input id="name" type="text" name="name" value="{{ old('name', $product->name) }}" required>
                        @error('name') <p class="app-field__error">{{ $message }}</p> @enderror
                    </div>

                    <div class="app-field">
                        <label for="price">Price</label>
                        <input id="price" type="number" step="0.01" min="0" name="price" value="{{ old('price', $product->price) }}" required>
                        @error('price') <p class="app-field__error">{{ $message }}</p> @enderror
                    </div>

                    <div class="app-field">
                        <label for="stock_quantity">Stock quantity</label>
                        <input id="stock_quantity" type="number" min="0" step="1" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" required>
                        @error('stock_quantity') <p class="app-field__error">{{ $message }}</p> @enderror
                    </div>

                    @if($product->image)
                        <div class="app-field">
                            <span class="text-sm font-semibold text-gray-700">Current image</span>
                            <img class="app-table__image" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        </div>
                    @endif

                    <div class="app-form__actions">
                        <a class="app-button app-button--secondary" href="{{ route('products.index') }}">Cancel</a>
                        <button class="app-button app-button--primary" type="submit">Update product</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</x-app-layout>
