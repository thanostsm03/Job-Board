<x-layout>
    <x-card>
        <form action="{{ route('employer.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name">Company Name</label>
                <x-text-input name="name" />
            </div>

            <x-button class="w-full">Create</x-button>
        </form>
    </x-card>
</x-layout>
