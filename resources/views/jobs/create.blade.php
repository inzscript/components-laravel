<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <form method="POST" action="/jobs" class="mt-6 space-y-12">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <p class="mt-1 text-sm/6 text-gray-600">Enter the job details to be posted to site.</p>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="title" id="title" required placeholder="Job Title" />
                            <x-form-error name="title" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="job_location">Location</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="job_location" id="job_location" required placeholder="Location" />
                            <x-form-error name="job_location" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="job_salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="job_salary" id="job_salary" required placeholder="$60,000" />
                            <x-form-error name="job_salary" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="job_description">Description</x-form-label>
                        <x-form-textarea name="job_description" id="job_description" rows="3" required placeholder="Position requirements" />
                        <x-form-error name="job_description" />
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/jobs/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <x-form-button>Save</x-form-button>
        </div>
    </form>

</x-layout>