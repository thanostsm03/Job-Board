<x-layout>
    <x-breadcrumbs class="mb-6" :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job>
        <p class="text-sm text-slate-600 mb-4 leading-relaxed">{!! nl2br(e($job->description)) !!}</p>

        @can('apply', $job)
            <x-link-button :href="route('job.application.create', $job)">Apply</x-link-button>
        @else
            <div class="text-center text-sm font-medium text-slate-500">You already applied to this job</div>
        @endcan

    </x-job-card>

    <x-card class="mb-4">
        <h2 class="mb-6 text-lg font-semibold text-slate-800 flex items-center">
            <svg class="w-5 h-5 mr-2 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            More {{ $job->employer->name }} Jobs
        </h2>

        <div class="space-y-3">
            @foreach ($job->employer->jobs as $otherJob)
                <div
                    class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-3 rounded-lg hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-200 gap-2 sm:gap-0">
                    <div class="flex-1">
                        <div class="text-sm font-medium text-slate-800 mb-1">
                            <a href="{{ route('jobs.show', $otherJob) }}"
                                class="hover:text-slate-900 transition-colors">{{ $otherJob->title }}</a>
                        </div>
                        <div class="text-xs text-slate-500 flex items-center">
                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $otherJob->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-sm font-semibold text-slate-700">
                        ${{ number_format($otherJob->salary) }}
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
</x-layout>
