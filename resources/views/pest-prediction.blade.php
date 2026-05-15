<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-stone-800 dark:text-stone-200 leading-tight">
            {{ __('AI Pest Guard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-stone-50 dark:bg-stone-950 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-stone-900 rounded-3xl border border-stone-200 dark:border-stone-800 overflow-hidden shadow-sm">
                <div class="p-8">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-red-100 dark:bg-red-900/50 rounded-2xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold dark:text-white">Pest Prediction</h3>
                            <p class="text-stone-500 text-sm">Analyze weather patterns to predict potential pest risks.</p>
                        </div>
                    </div>

                    <form action="{{ route('pest.prediction') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-stone-700 dark:text-stone-300 mb-2">Crop Being Grown</label>
                                <input type="text" name="crop" placeholder="e.g. Rice, Wheat, Cotton" required class="w-full px-4 py-3 bg-stone-50 dark:bg-stone-800 border border-stone-200 dark:border-stone-700 rounded-2xl text-sm focus:ring-2 focus:ring-red-500 transition-all dark:text-white">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-stone-700 dark:text-stone-300 mb-2">Your City</label>
                                <input type="text" name="city" placeholder="e.g. Ludhiana, Amravati" required class="w-full px-4 py-3 bg-stone-50 dark:bg-stone-800 border border-stone-200 dark:border-stone-700 rounded-2xl text-sm focus:ring-2 focus:ring-red-500 transition-all dark:text-white">
                            </div>
                        </div>

                        <button type="submit" class="w-full py-4 bg-red-600 hover:bg-red-700 text-white rounded-2xl text-lg font-bold transition-all shadow-lg hover:shadow-red-500/25">
                            Check Pest Risks
                        </button>
                    </form>

                    @isset($prediction)
                        <div class="mt-10 p-8 bg-red-50 dark:bg-red-900/10 border border-red-100 dark:border-red-900/30 rounded-3xl animate-fade-in">
                            <div class="flex items-center gap-2 mb-4">
                                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <h4 class="font-bold text-red-800 dark:text-red-400">AI Risk Assessment</h4>
                            </div>
                            <div class="prose dark:prose-invert max-w-none text-stone-700 dark:text-stone-300 whitespace-pre-line">
                                {{ $prediction }}
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
