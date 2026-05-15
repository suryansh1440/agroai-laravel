<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-stone-800 dark:text-stone-200 leading-tight">
            {{ __('AI Crop Recommendation') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-stone-50 dark:bg-stone-950 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-stone-900 rounded-3xl border border-stone-200 dark:border-stone-800 overflow-hidden shadow-sm">
                <div class="p-8">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-green-100 dark:bg-green-900/50 rounded-2xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold dark:text-white">Crop Advisor</h3>
                            <p class="text-stone-500 text-sm">Tell us about your farm to get the best suggestions.</p>
                        </div>
                    </div>

                    <form action="{{ route('crop.recommendation') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-stone-700 dark:text-stone-300 mb-2">Soil Type</label>
                                <select name="soil_type" class="w-full px-4 py-3 bg-stone-50 dark:bg-stone-800 border border-stone-200 dark:border-stone-700 rounded-2xl text-sm focus:ring-2 focus:ring-green-500 transition-all dark:text-white">
                                    <option value="Alluvial">Alluvial (Loamy)</option>
                                    <option value="Black">Black (Regur)</option>
                                    <option value="Red">Red Soil</option>
                                    <option value="Laterite">Laterite</option>
                                    <option value="Desert">Desert / Sandy</option>
                                    <option value="Mountain">Mountain / Peaty</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-stone-700 dark:text-stone-300 mb-2">Region / State</label>
                                <input type="text" name="region" placeholder="e.g. Punjab, Maharashtra" required class="w-full px-4 py-3 bg-stone-50 dark:bg-stone-800 border border-stone-200 dark:border-stone-700 rounded-2xl text-sm focus:ring-2 focus:ring-green-500 transition-all dark:text-white">
                            </div>
                        </div>

                        <button type="submit" class="w-full py-4 bg-green-600 hover:bg-green-700 text-white rounded-2xl text-lg font-bold transition-all shadow-lg hover:shadow-green-500/25">
                            Get Recommendations
                        </button>
                    </form>

                    @isset($recommendation)
                        <div class="mt-10 p-8 bg-green-50 dark:bg-green-900/10 border border-green-100 dark:border-green-900/30 rounded-3xl animate-fade-in">
                            <div class="flex items-center gap-2 mb-4">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <h4 class="font-bold text-green-800 dark:text-green-400">AI Recommendation Result</h4>
                            </div>
                            <div class="prose dark:prose-invert max-w-none text-stone-700 dark:text-stone-300 whitespace-pre-line">
                                {{ $recommendation }}
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
