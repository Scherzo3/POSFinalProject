<x-app-layout>
    <div class="app-page">
        <div class="app-page__heading">
            <div>
                <h1>Customers</h1>
                <p>Manage the people who shop with you.</p>
            </div>
            <a class="app-button app-button--primary" href="{{ route('customers.create') }}">Add customer</a>
        </div>

        <section class="app-card">
            @if($customers->isEmpty())
                <div class="app-empty">
                    No customers yet. Add a customer to get started.
                </div>
            @else
                <div class="app-table-wrap">
                    <table class="app-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td class="font-semibold">{{ $customer->full_name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone ?: '—' }}</td>
                                    <td>
                                        <div class="app-table__actions">
                                            <a class="app-text-button" href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Delete this customer?')">
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
