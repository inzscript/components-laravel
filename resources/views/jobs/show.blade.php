<x-layout>
    <x-slot:heading>
        {{ $job->title }}
    </x-slot:heading>

    <p class="text-black text-md pb-4">Pays {{ $job->salary }}</p>
    <p class="text-black text-md pb-4">Location: {{ $job->location }}</p>
    <p class="text-black text-md pb-4">{{ $job->description }}</p>

    <p class="mt-6">
        <x-button href="/jobs/{{ $job->id }}/edit">Edit</x-button>
    </p>

</x-layout>
