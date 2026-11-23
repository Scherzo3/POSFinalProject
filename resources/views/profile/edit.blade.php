<x-app-layout>
    <div class="app-profile-stack">
        <div class="app-page__heading">
            <div>
                <h1>{{ __('Profile settings') }}</h1>
                <p>Manage your account details and password.</p>
            </div>
        </div>

        <section class="app-profile-card">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
        </section>

        <section class="app-profile-card">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
        </section>

        <section class="app-profile-card">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
        </section>
    </div>
</x-app-layout>
