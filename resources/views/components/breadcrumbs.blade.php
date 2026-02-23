<nav {{ $attributes }}>
    <ul class="flex items-center space-x-2 text-sm">
        <li>
            <a href="/" class="text-slate-600 hover:text-slate-900 transition-colors duration-200 font-medium">Home</a>
        </li>

        @foreach ($links as $label => $link)
            <li class="text-slate-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </li>
            <li>
                <a href="{{ $link }}" class="text-slate-600 hover:text-slate-900 transition-colors duration-200 font-medium">{{ $label }}</a>
            </li>
        @endforeach
    </ul>
</nav>
