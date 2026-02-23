<button
    {{ $attributes->merge(['class' => 'rounded-lg border border-slate-300 bg-white px-4 py-2 text-center text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50 hover:text-slate-900 transition-all duration-200 hover:shadow-md hover:border-slate-400 active:scale-95 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
