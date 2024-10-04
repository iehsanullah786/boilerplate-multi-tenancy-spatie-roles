<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <h2>Edit Roles for {{ $user->name }}</h2>
<form method="POST" action="{{ route('users.roles.update', $user) }}">
    @csrf
    @foreach ($roles as $role)
        <div>
            <label>
                <input type="checkbox" name="roles[]" value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                {{ $role->name }}
            </label>
        </div>
    @endforeach
    <button type="submit">Update Roles</button>
</form>


</x-app-layout>
