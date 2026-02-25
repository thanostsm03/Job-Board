<x-layout>
    <x-breadcrumbs class="mb-6" :links="['My Jobs' => route('my-jobs.index'), 'Edit' => '#']" />

    <x-card>
        <h2 class="mb-6 text-lg font-semibold text-slate-800 flex items-center">
            <svg class="w-5 h-5 mr-2 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>
            Edit Job
        </h2>

        <form action="{{ route('my-jobs.update', $job) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6 grid grid-cols-2 gap-6">
                <div>
                    <label for="title" class="mb-2 block text-sm font-semibold text-slate-700">Job Title</label>
                    <x-text-input name="title" :value="$job->title" />
                </div>
                <div>
                    <label for="location" class="mb-2 block text-sm font-semibold text-slate-700">Location</label>
                    <x-text-input name="location" :value="$job->location" />
                </div>
                <div class="col-span-2">
                    <label for="salary" class="mb-2 block text-sm font-semibold text-slate-700">Salary</label>
                    <x-text-input name="salary" type="number" :value="$job->salary" />
                </div>
                <div class="col-span-2">
                    <label for="description" class="mb-2 block text-sm font-semibold text-slate-700">Description</label>
                    <textarea name="description" id="description" rows="4" 
                        class="w-full rounded-lg border-0 py-2 px-3.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2 transition-shadow ring-slate-300 focus:ring-slate-400"
                        placeholder="Job description...">{{ old('description', $job->description) }}</textarea>
                    @error('description')
                        <div class="mt-1.5 flex items-center gap-1.5 text-xs text-red-600">
                            <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                            </svg>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="experience" class="mb-2 block text-sm font-semibold text-slate-700">Experience</label>
                    <x-radio-group name="experience" :value="$job->experience" :allOption="false" :options="array_combine(
                        array_map('ucfirst', \App\Models\Job::$experience),
                        \App\Models\Job::$experience,
                    )" />
                </div>
                <div>
                    <label for="category" class="mb-2 block text-sm font-semibold text-slate-700">Category</label>
                    <x-radio-group name="category" :options="App\Models\Job::$category" :allOption="false" :value="$job->category" />
                </div>
                <x-button class="w-full col-span-2">Update Job</x-button>
            </div>
        </form>
    </x-card>
</x-layout>
