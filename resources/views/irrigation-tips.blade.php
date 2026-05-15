<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-stone-800 dark:text-stone-200 leading-tight">
            {{ __('AI AquaFlow') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-stone-50 dark:bg-stone-950 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-stone-900 rounded-3xl border border-stone-200 dark:border-stone-800 overflow-hidden shadow-sm">
                <div class="p-8">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/50 rounded-2xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold dark:text-white">Smart Irrigation</h3>
                            <p class="text-stone-500 text-sm">Optimize your water usage based on rainfall forecasts.</p>
                        </div>
                    </div>

                    <form action="{{ route('irrigation.tips') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-stone-700 dark:text-stone-300 mb-2">Crop Type</label>
                                <input type="text" name="crop" placeholder="e.g. Maize, Sugarcane" required class="w-full px-4 py-3 bg-stone-50 dark:bg-stone-800 border border-stone-200 dark:border-stone-700 rounded-2xl text-sm focus:ring-2 focus:ring-blue-500 transition-all dark:text-white">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-stone-700 dark:text-stone-300 mb-2">Your City</label>
                                <input type="text" name="city" placeholder="e.g. Surat, Indore" required class="w-full px-4 py-3 bg-stone-50 dark:bg-stone-800 border border-stone-200 dark:border-stone-700 rounded-2xl text-sm focus:ring-2 focus:ring-blue-500 transition-all dark:text-white">
                            </div>
                        </div>

                        <button type="submit" class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl text-lg font-bold transition-all shadow-lg hover:shadow-blue-500/25">
                            Get Irrigation Tips
                        </button>
                    </form>

                    @isset($tips)
                        <div class="mt-10 p-8 bg-blue-50 dark:bg-blue-900/10 border border-blue-100 dark:border-blue-900/30 rounded-3xl animate-fade-in">
                            <div class="flex items-center gap-2 mb-4">
                                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <h4 class="font-bold text-blue-800 dark:text-blue-400">AI Irrigation Advice</h4>
                            </div>
                            <div class="prose dark:prose-invert max-w-none text-stone-700 dark:text-stone-300 whitespace-pre-line">
                                {{ $tips }}
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
