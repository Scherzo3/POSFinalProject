<x-app-layout>
    <div class="app-page app-page--narrow">
        <div class="app-page__heading">
            <div>
                <h1>Add product</h1>
                <p>Add an item to your store catalog.</p>
            </div>
            <a class="app-button app-button--secondary" href="{{ route('products.index') }}">Back to products</a>
        </div>

        <section class="app-card">
            <div class="app-card__body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="app-form">
                    @csrf

                    <div class="app-field">
                        <label for="name">Product name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required>
                        @error('name') <p class="app-field__error">{{ $message }}</p> @enderror
                    </div>

                    <div class="app-field">
                        <label for="price">Price</label>
                        <input id="price" type="number" step="0.01" min="0" name="price" value="{{ old('price') }}" required>
                        @error('price') <p class="app-field__error">{{ $message }}</p> @enderror
                    </div>

                    <div class="app-field">
                        <label for="stock_quantity">Stock quantity</label>
                        <input id="stock_quantity" type="number" min="0" step="1" name="stock_quantity" value="{{ old('stock_quantity') }}" required>
                        @error('stock_quantity') <p class="app-field__error">{{ $message }}</p> @enderror
                    </div>

                    <div class="app-field">
                        <label for="image">Product image <span class="font-normal text-gray-500">(optional)</span></label>
                        <input id="image" type="file" name="image" accept="image/jpeg,image/png">
                        <p class="text-xs text-gray-500">JPG or PNG, up to 2 MB.</p>
                        @error('image') <p class="app-field__error">{{ $message }}</p> @enderror
                    </div>

                    <div class="app-form__actions">
                        <a class="app-button app-button--secondary" href="{{ route('products.index') }}">Cancel</a>
                        <button class="app-button app-button--primary" type="submit">Save product</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</x-app-layout>
