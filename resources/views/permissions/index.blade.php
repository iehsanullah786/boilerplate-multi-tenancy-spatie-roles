<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="container">
        <div class="bg-white border rounded-3 shadow-sm">
            <div class="p-6">
                <h2 class="mb-4">Permission Information</h2>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $p)
                        <tr>
                            <td>{{ $p->id }}</td> <!-- Auto-incrementing number -->
                            <td>{{ $p->name }}</td> <!-- Auto-incrementing number -->
                            <td>
        
                                <a href="{{ route('permissions.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('permissions.destroy', $p->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('permissions.create')}}" class="btn btn-primary">Create Permission</a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>