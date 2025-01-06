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
                <div class="sm:col-span-4">
                    <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                    <div class="mt-2">
                        <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                        <input required type="text" name="title" id="title" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" placeholder="Job Title">
                        </div>

                        @error('title')
                            <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
                        @enderror

                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="job_location" class="block text-sm/6 font-medium text-gray-900">Location</label>
                    <div class="mt-2">
                        <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                        <input required type="text" name="job_location" id="job_location" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" placeholder="City, State">
                        </div>

                        @error('job_location')
                            <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
                        @enderror

                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="job_salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                    <div class="mt-2">
                        <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                        <input required type="text" name="job_salary" id="job_salary" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" placeholder="$60,000">
                        </div>

                        @error('job_salary')
                            <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
                        @enderror

                    </div>
                </div>

                <div class="col-span-full">
                <label for="job_description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                <div class="mt-2">
                    <textarea required name="job_description" id="job_description" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                </div>
                <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about job requirements.</p>

                @error('job_description')
                    <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
                @enderror
                </div>
            </div>

            <!-- @if($errors->any())
                <ul class="mt-6 list-disc list-inside text-sm/6 text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif -->

            </div>
        
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>

</x-layout>