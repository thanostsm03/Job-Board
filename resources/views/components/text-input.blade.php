<div class="relative" x-data="{ value: '{{ $value }}' }">
    @if ($formRef)
        <button type="button"
            class="absolute top-0 right-0 flex h-full items-center pr-2.5 text-slate-400 hover:text-slate-600 transition-colors"
            x-show="value" @click="$refs['input-{{ $name }}'].value=''; $refs['{{ $formRef }}'].submit();">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    @endif
    <input x-ref="input-{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
        name="{{ $name }}" value="{{ $value }}" id="{{ $name }}" x-model="value"
        @class([
            'w-full rounded-lg border-0 py-2 px-3.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2 transition-shadow',
            'pr-8' => $formRef && $type === 'text',
            'file:mr-4 file:py-1.5 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200' => $type === 'file',
            'ring-slate-300 focus:ring-slate-400' => !$errors->has($name),
            'ring-red-500 focus:ring-red-500' => $errors->has($name)
        ]) />

    @error($name)
        <div class="mt-1.5 flex items-center gap-1.5 text-xs text-red-600">
            <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
            </svg>
            <span>{{ $message }}</span>
        </div>
    @enderror
</div>
