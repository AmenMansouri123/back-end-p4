<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form method="POST" action="{{ route('praktijkmanagement.update', $user->id) }}">
                @csrf

                <div>
                    <label>Naam</label>
                    <input type="text" name="name" value="{{ $user->name }}">
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $user->email }}">
                </div>

                <div>
                    <label>Rol</label>
                    <input type="text" name="rolename" value="{{ $user->rolename }}">
                </div>

                <button type="submit" class="btn btn-success">
                    Opslaan
                </button>
            </form>

        </div>
    </div>
</x-app-layout>