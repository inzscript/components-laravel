<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>

    <p class="text-black text-md pb-4">Looking for an exciting career. Take a look at our opportunities to focus on who you are.</p>

    <h2 class="text-xl font-bold tracking-tight text-gray-900">Open Jobs</h2>
    @foreach ($jobs as $job)
        <li>
            <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:text-blue-800">
                {{ $job['title'] }}: Pays {{ $job['salary'] }}
            </a>
        </li>
    @endforeach
</x-layout>
