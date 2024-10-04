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
                <h2 class="mb-4">User Information</h2>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                            <th>Assign Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $u)
                        <tr>
                            <td>{{ $u->id }}</td> <!-- Auto-incrementing number -->
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>
                 
                                <a href="{{ route('users.edit', $u->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('users.destroy', $u->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                            <td>
                            <form method="POST"  style="display:inline-block;">
                                    @csrf
        
                                    <select name="rolename">
                                        @foreach($roles as $r )
                                        <option value="{{$r->name}}">
                                        {{$r->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-danger" >Assign</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('users.create')}}" class="btn btn-primary">Create User</a>

            </div>
        </div>
    </div>
</div>
</x-app-layout>

