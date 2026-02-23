<x-layout>
    <x-breadcrumbs class="mb-6" :links="['Jobs' => route('jobs.index')]" />
    <x-card class="mb-6" x-data="">
        <form x-ref="filters" id="filtering-form" action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <div class="mb-2 font-semibold text-slate-700">Search</div>
                    <x-text-input name="search" placeholder="Search by title or company" value="{{ request('search') }}"
                        form-ref="filters" />
                </div>
                <div>
                    <div class="mb-2 font-semibold text-slate-700">Salary</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" placeholder="From" value="{{ request('min_salary') }}"
                            form-ref="filters" />
                        <x-text-input name="max_salary" placeholder="To" value="{{ request('max_salary') }}"
                            form-ref="filters" />
                    </div>
                </div>
                <div>
                    <div class="mb-2 font-semibold text-slate-700">Experience</div>
                    <x-radio-group name="experience" :options="array_combine(
                        array_map('ucfirst', \App\Models\Job::$experience),
                        \App\Models\Job::$experience,
                    )" />
                </div>
                <div>
                    <div class="mb-2 font-semibold text-slate-700">Category</div>
                    <x-radio-group name="category" :options="\App\Models\Job::$category" />
                </div>
            </div>
            <x-button class="w-full">Filter</x-button>
        </form>
    </x-card>
    @foreach ($jobs as $job)
        <x-job-card class="mb-4" :$job>
            <div>
                <x-link-button :href="route('jobs.show', $job)">Show</x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
