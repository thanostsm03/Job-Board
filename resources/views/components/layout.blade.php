<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Job Board</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body
    class="mx-auto mt-6 sm:mt-10 max-w-2xl bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90% min-h-screen px-6 sm:px-4 pb-8 text-slate-700">
    <nav
        class="mb-10 flex flex-col sm:flex-row justify-between items-center py-4 px-4 sm:px-6 bg-white/60 backdrop-blur-sm rounded-lg shadow-sm border border-white/80 gap-4 sm:gap-0">
        <ul class="flex space-x-4 sm:space-x-6">
            <li>
                <a href="{{ route('jobs.index') }}"
                    class="text-slate-700 hover:text-slate-900 font-semibold transition-colors flex items-center text-sm sm:text-base">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Home
                </a>
            </li>
        </ul>
        <ul class="flex space-x-4 sm:space-x-6 items-center">
            @auth
                <li class="flex items-center text-slate-600 font-medium text-sm sm:text-base">
                    <svg class="w-4 h-4 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="hidden sm:inline">{{ auth()->user()->name }}</span>
                </li>
                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            class="text-slate-700 hover:text-slate-900 font-semibold transition-colors flex items-center text-sm sm:text-base">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="hidden sm:inline">Logout</span>
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('auth.create') }}"
                        class="text-slate-700 hover:text-slate-900 font-semibold transition-colors flex items-center text-sm sm:text-base">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Sign in
                    </a>
                </li>
            @endauth
        </ul>
    </nav>
    @if (session('success'))
        <div role="alert"
            class="my-8 rounded-lg border border-green-200 bg-green-50 p-4 shadow-sm backdrop-blur-sm flex items-start gap-3 animate-in fade-in slide-in-from-top-2 duration-300">
            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div class="flex-1">
                <p class="font-semibold text-green-800">Success!</p>
                <p class="text-sm text-green-700 mt-1">{{ session('success') }}</p>
            </div>
        </div>
    @endif
    {{ $slot }}
</body>

</html>
