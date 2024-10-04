<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="container m-0">
        <div class="bg-white border rounded-3 shadow-sm">
            <div class="p-6">
                <h2 class="mb-4">Tenants Information</h2>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Tenant Name</th>
                            <th>Domain Name</th>
                            <th>Email</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tenants as $t)
                        <tr>
                            <td>{{ $t->name }}</td>
                    <td>{{ $t->domain_name }}.{{ config('app.domain') }}</td>
                            <td>{{ $t->email }}</td>
                            <td>
                                    <form action="{{route('tenants.destroy', $t->id)}}" method="POST" style="display:inline-block;">
                                        @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('tenants.create') }}" class="btn btn-primary">Create Tenant</a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>


