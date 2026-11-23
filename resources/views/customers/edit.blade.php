<x-app-layout>
    <div class="app-page app-page--narrow">
        <div class="app-page__heading">
            <div>
                <h1>Edit customer</h1>
                <p>Update {{ $customer->full_name }}’s contact details.</p>
            </div>
            <a class="app-button app-button--secondary" href="{{ route('customers.index') }}">Back to customers</a>
        </div>

        <section class="app-card">
            <div class="app-card__body">
                <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="app-form">
                    @csrf
                    @method('PUT')

                    <div class="app-field">
                        <label for="full_name">Full name</label>
                        <input id="full_name" type="text" name="full_name" value="{{ old('full_name', $customer->full_name) }}" required>
                        @error('full_name') <p class="app-field__error">{{ $message }}</p> @enderror
                    </div>

                    <div class="app-field">
                        <label for="email">Email address</label>
                        <input id="email" type="email" name="email" value="{{ old('email', $customer->email) }}" required>
                        @error('email') <p class="app-field__error">{{ $message }}</p> @enderror
                    </div>

                    <div class="app-field">
                        <label for="phone">Phone number</label>
                        <input id="phone" type="text" name="phone" value="{{ old('phone', $customer->phone) }}" required>
                        @error('phone') <p class="app-field__error">{{ $message }}</p> @enderror
                    </div>

                    <div class="app-form__actions">
                        <a class="app-button app-button--secondary" href="{{ route('customers.index') }}">Cancel</a>
                        <button class="app-button app-button--primary" type="submit">Update customer</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</x-app-layout>
