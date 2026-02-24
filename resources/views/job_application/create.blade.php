<x-layout>
    <x-breadcrumbs class="mb-6" :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show', $job), 'Apply' => '#']" />

    <x-job-card :$job />

    <x-card>
        <h2 class="mb-6 text-lg font-semibold text-slate-800 flex items-center">
            <svg class="w-5 h-5 mr-2 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Your Job Application
        </h2>

        <form action="{{ route('job.application.store', $job) }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="expected_salary" class="mb-2 block text-sm font-semibold text-slate-700">Expected Salary</label>
                <x-text-input type="number" name="expected_salary" />
            </div>

            <x-button class="w-full">Apply</x-button>
        </form>
    </x-card>
</x-layout>
