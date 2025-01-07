<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->profile->username ?? $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
    <h3>Over mij</h3>
    <p>{{ $user->about ?? 'Nog geen informatie toegevoegd.' }}</p>

    <h3>Verjaardag</h3>
    <p>{{ $user->birthday ? $user->birthday->format('d-m-Y') : 'Niet opgegeven.' }}</p>

    <h3>Profielfoto</h3>
    @if ($user->profile_image)
        <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profielfoto" class="w-32 h-32 rounded-full">
    @else
        <p>Geen profielfoto geüpload.</p>
    @endif
</div>

        </div>
    </div>
</x-app-layout>
