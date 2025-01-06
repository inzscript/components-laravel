<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>

    <p class="text-black text-md pb-4">Looking for an exciting career. Take a look at our opportunities to focus on who you are.</p>

    <h2 class="text-xl font-bold tracking-tight text-gray-900">Open Jobs</h2>

    <div class="space-y-4">
    @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="text-blue-500">{{ $job->employer->name }}</div>
                <div class="text-blue-500">{{ $job->location }}</div>
                <div class=""><strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }}</div>
            </a>
    @endforeach
    <div>
        {{ $jobs->links() }}
    </div>
</div>
</x-layout>
