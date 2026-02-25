<div class="space-y-2">
    @if ($allOption)
        <label class="flex items-center cursor-pointer group">
            <input type="radio" name="{{ $name }}" value="" @checked(!request($name))
                class="w-4 h-4 text-slate-700 border-slate-300 focus:ring-slate-400 focus:ring-2 transition-all" />
            <span class="ml-2.5 text-sm text-slate-700 group-hover:text-slate-900 transition-colors">All</span>
        </label>
    @endif

    @foreach ($optionsWithLabels as $label => $option)
        <label class="flex items-center cursor-pointer group">
            <input type="radio" name="{{ $name }}" value="{{ $option }}" @checked($option === ($value ?? request($name)))
                class="w-4 h-4 text-slate-700 border-slate-300 focus:ring-slate-400 focus:ring-2 transition-all" />
            <span
                class="ml-2.5 text-sm text-slate-700 group-hover:text-slate-900 transition-colors">{{ $label }}</span>
        </label>
    @endforeach
</div>
