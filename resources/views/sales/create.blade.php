<x-app-layout>
    <div class="sale-page">
        <div class="sale-page__container">
            <header class="sale-page__header">
                <div>
                    <p class="sale-page__eyebrow">Point of sale</p>
                    <h1>New sale</h1>
                    <p class="sale-page__intro">Enter the details below to record a transaction.</p>
                </div>
                <a class="sale-page__back" href="{{ route('sales.index') }}">Sales history</a>
            </header>

            <section class="sale-card">
                <div class="sale-card__heading">
                    <h2>Sale details</h2>
                    <p>Select a customer and product, then enter the quantity.</p>
                </div>

                @if(session('error'))
                    <p class="sale-alert" role="alert">{{ session('error') }}</p>
                @endif

                @if($errors->any())
                    <p class="sale-alert" role="alert">Please check the form and try again.</p>
                @endif

                <form action="{{ route('sales.store') }}" method="POST" class="sale-form">
                    @csrf

                    <div class="sale-field">
                        <label for="customer_id">Customer</label>
                        <select id="customer_id" name="customer_id" required>
                            <option value="">Select a customer</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" @selected(old('customer_id') == $customer->id)>
                                    {{ $customer->full_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('customer_id')
                            <p class="sale-field__error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sale-field">
                        <label for="product_id">Product</label>
                        <select id="product_id" name="product_id" required>
                            <option value="">Select a product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" @selected(old('product_id') == $product->id)>
                                    {{ $product->name }} · ₱{{ number_format($product->price, 2) }} · {{ $product->stock_quantity }} in stock
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <p class="sale-field__error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sale-field">
                        <label for="quantity">Quantity</label>
                        <input id="quantity" type="number" name="quantity" min="1" step="1" value="{{ old('quantity', 1) }}" required>
                        @error('quantity')
                            <p class="sale-field__error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sale-form__actions">
                        <a class="sale-button sale-button--secondary" href="{{ route('sales.index') }}">Cancel</a>
                        <button class="sale-button sale-button--primary" type="submit">Complete sale</button>
                    </div>
                </form>
            </section>

            <p class="sale-page__note">Stock availability is checked when you complete the sale.</p>
        </div>
    </div>
</x-app-layout>
