<x-layout>
    <h1 class="my-8 sm:my-16 text-center text-2xl sm:text-4xl font-semibold text-slate-800 px-4">Sign in to your account</h1>

    <x-card class="py-8 sm:py-10 px-6 sm:px-16">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">E-mail</label>
                <x-text-input name="email" />
            </div>
            <div class="mb-6">
                <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">Password</label>
                <x-text-input name="password" type="password" />
            </div>

            <div class="mb-8 flex flex-col sm:flex-row justify-between text-sm font-medium items-start sm:items-center gap-4 sm:gap-0">
                <div>
                    <label class="flex items-center space-x-2 cursor-pointer group">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-slate-700 focus:ring-slate-400 focus:ring-2 transition-all">
                        <span class="text-slate-700 group-hover:text-slate-900 transition-colors">Remember me</span>
                    </label>
                </div>
                <div>
                    <a href="#" class="text-indigo-600 hover:text-indigo-700 hover:underline transition-colors">Forgot your password?</a>
                </div>
            </div>
            <x-button class="w-full">Login</x-button>
        </form>
    </x-card>
</x-layout>
