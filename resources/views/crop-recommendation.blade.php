<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-stone-800 dark:text-stone-200 leading-tight">
            {{ __('AI Crop Recommendation') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-stone-50 dark:bg-stone-950 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-stone-900 rounded-3xl border border-stone-200 dark:border-stone-800 overflow-hidden shadow-sm">
                <div class="p-8">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-green-100 dark:bg-green-900/50 rounded-2xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold dark:text-white">Crop Advisor</h3>
                            <p class="text-stone-500 text-sm">Provide comprehensive farm data for the most accurate AI prediction.</p>
                        </div>
                    </div>

                    <form action="{{ route('crop.recommendation') }}" method="POST" class="space-y-6" x-data="cropForm()" @submit="isSubmitting = true">
                        @csrf
                        
                        <!-- Location & Soil Section -->
                        <div class="p-6 bg-stone-50 dark:bg-stone-800/50 rounded-2xl border border-stone-100 dark:border-stone-700">
                            <h4 class="font-bold text-stone-800 dark:text-stone-200 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                Basic Farm Details
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-stone-700 dark:text-stone-300 mb-2">Location / Region</label>
                                    <div class="flex gap-2">
                                        <input type="text" name="region" x-model="location" placeholder="e.g. Punjab, Maharashtra" required class="w-full px-4 py-3 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-700 rounded-xl text-sm focus:ring-2 focus:ring-green-500 transition-all dark:text-white">
                                        <button type="button" @click="detectLocation()" class="px-4 py-3 bg-stone-200 hover:bg-stone-300 dark:bg-stone-700 dark:hover:bg-stone-600 text-stone-700 dark:text-stone-300 rounded-xl transition-all flex items-center justify-center" title="Auto-detect Location">
                                            <svg x-show="!loadingLocation" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                                            <svg x-show="loadingLocation" class="w-5 h-5 animate-spin" style="display: none;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-stone-700 dark:text-stone-300 mb-2">Soil Type</label>
                                    <select name="soil_type" class="w-full px-4 py-3 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-700 rounded-xl text-sm focus:ring-2 focus:ring-green-500 transition-all dark:text-white">
                                        <option value="Alluvial">Alluvial (Loamy)</option>
                                        <option value="Black">Black (Regur)</option>
                                        <option value="Red">Red Soil</option>
                                        <option value="Laterite">Laterite</option>
                                        <option value="Desert">Desert / Sandy</option>
                                        <option value="Mountain">Mountain / Peaty</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Soil Nutrients Section -->
                        <div class="p-6 bg-stone-50 dark:bg-stone-800/50 rounded-2xl border border-stone-100 dark:border-stone-700">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="font-bold text-stone-800 dark:text-stone-200 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                                    Soil Health Data (Optional)
                                </h4>
                                <span class="text-xs bg-stone-200 dark:bg-stone-700 text-stone-600 dark:text-stone-400 px-2 py-1 rounded">For better accuracy</span>
                            </div>
                            
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-stone-500 dark:text-stone-400 mb-1">Nitrogen (N)</label>
                                    <input type="number" name="nitrogen" placeholder="mg/kg" class="w-full px-3 py-2 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-700 rounded-xl text-sm focus:ring-2 focus:ring-green-500 transition-all dark:text-white">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-stone-500 dark:text-stone-400 mb-1">Phosphorus (P)</label>
                                    <input type="number" name="phosphorus" placeholder="mg/kg" class="w-full px-3 py-2 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-700 rounded-xl text-sm focus:ring-2 focus:ring-green-500 transition-all dark:text-white">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-stone-500 dark:text-stone-400 mb-1">Potassium (K)</label>
                                    <input type="number" name="potassium" placeholder="mg/kg" class="w-full px-3 py-2 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-700 rounded-xl text-sm focus:ring-2 focus:ring-green-500 transition-all dark:text-white">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-stone-500 dark:text-stone-400 mb-1">pH Level</label>
                                    <input type="number" step="0.1" name="ph_level" placeholder="0-14" class="w-full px-3 py-2 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-700 rounded-xl text-sm focus:ring-2 focus:ring-green-500 transition-all dark:text-white">
                                </div>
                            </div>
                        </div>

                        <button type="submit" :disabled="isSubmitting" class="w-full py-4 bg-green-600 hover:bg-green-700 text-white rounded-2xl text-lg font-bold transition-all shadow-lg hover:shadow-green-500/25 flex items-center justify-center gap-2">
                            <span x-show="!isSubmitting">Analyze & Get Recommendation</span>
                            <span x-show="isSubmitting" style="display: none;" class="flex items-center gap-2">
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Analyzing Data...
                            </span>
                        </button>
                    </form>

                    <!-- Results Section -->
                    @isset($recommendation)
                        <div class="mt-12 animate-fade-in">
                            <div class="flex items-center gap-3 mb-6">
                                <span class="w-8 h-1 bg-green-500 rounded-full"></span>
                                <h3 class="text-2xl font-bold dark:text-white">AI Analysis Result</h3>
                                <span class="w-8 h-1 bg-green-500 rounded-full"></span>
                            </div>

                            <!-- Main Recommended Crop -->
                            <div class="bg-gradient-to-br from-green-500 to-emerald-700 rounded-3xl p-8 text-white shadow-xl mb-6 relative overflow-hidden group">
                                <div class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                <div class="relative z-10">
                                    <span class="bg-white/20 px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase backdrop-blur-sm mb-4 inline-block">Highly Recommended</span>
                                    <h2 class="text-5xl font-extrabold mb-4">{{ collect($recommendation)->get('crop_name', 'Unknown Crop') }}</h2>
                                    <p class="text-green-50 leading-relaxed text-lg max-w-2xl">{{ collect($recommendation)->get('reasoning', 'No reasoning provided.') }}</p>
                                </div>
                                <svg class="absolute -bottom-10 -right-10 w-64 h-64 text-green-400/20 transform -rotate-12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.3 1.046A12.014 12.014 0 0010.375 1.5c-2.825 1.002-5.748 4.095-7.143 7.747C1.868 12.83 2 15.688 2 15.688a1 1 0 001.071 1.054c0 0 2.871.18 6.551-1.22 3.666-1.393 6.743-4.321 7.744-7.152.483-1.36.712-2.618.665-3.665-.015-.35-.043-.659-.08-1.015a1 1 0 00-1.127-.852A12.115 12.115 0 0011.3 1.046zm-2.844 7.206a2 2 0 11-2.828-2.828 2 2 0 012.828 2.828z" clip-rule="evenodd"></path></svg>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                                <!-- Advantages -->
                                <div class="lg:col-span-1 bg-stone-50 dark:bg-stone-800 rounded-3xl p-6 border border-stone-200 dark:border-stone-700">
                                    <h4 class="font-bold text-stone-900 dark:text-white mb-4 flex items-center gap-2 text-lg">
                                        <div class="w-8 h-8 rounded-full bg-green-100 dark:bg-green-900/50 flex items-center justify-center text-green-600">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        </div>
                                        Key Advantages
                                    </h4>
                                    <ul class="space-y-3">
                                        @foreach(collect($recommendation)->get('advantages', []) as $advantage)
                                        <li class="flex items-start gap-2 text-stone-600 dark:text-stone-400 text-sm">
                                            <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <span class="leading-relaxed">{{ $advantage }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <!-- Disadvantages/Risks -->
                                <div class="lg:col-span-1 bg-stone-50 dark:bg-stone-800 rounded-3xl p-6 border border-stone-200 dark:border-stone-700">
                                    <h4 class="font-bold text-stone-900 dark:text-white mb-4 flex items-center gap-2 text-lg">
                                        <div class="w-8 h-8 rounded-full bg-red-100 dark:bg-red-900/50 flex items-center justify-center text-red-600">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                        </div>
                                        Potential Risks
                                    </h4>
                                    <ul class="space-y-3">
                                        @foreach(collect($recommendation)->get('disadvantages', []) as $risk)
                                        <li class="flex items-start gap-2 text-stone-600 dark:text-stone-400 text-sm">
                                            <svg class="w-5 h-5 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <span class="leading-relaxed">{{ $risk }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <!-- Stats -->
                                <div class="lg:col-span-1 flex flex-col gap-4">
                                    <div class="bg-stone-50 dark:bg-stone-800 rounded-2xl p-5 border border-stone-200 dark:border-stone-700 flex items-center gap-4 hover:border-blue-500 transition-colors">
                                        <div class="w-10 h-10 rounded-xl bg-blue-100 dark:bg-blue-900/50 text-blue-600 flex items-center justify-center shrink-0">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-stone-500 font-bold uppercase tracking-wider">Est. Yield</p>
                                            <p class="font-bold text-stone-900 dark:text-white">{{ collect($recommendation)->get('estimated_yield', 'N/A') }}</p>
                                        </div>
                                    </div>
                                    <div class="bg-stone-50 dark:bg-stone-800 rounded-2xl p-5 border border-stone-200 dark:border-stone-700 flex items-center gap-4 hover:border-amber-500 transition-colors">
                                        <div class="w-10 h-10 rounded-xl bg-amber-100 dark:bg-amber-900/50 text-amber-600 flex items-center justify-center shrink-0">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-stone-500 font-bold uppercase tracking-wider">Growth Duration</p>
                                            <p class="font-bold text-stone-900 dark:text-white">{{ collect($recommendation)->get('growth_duration', 'N/A') }}</p>
                                        </div>
                                    </div>
                                    <div class="bg-stone-50 dark:bg-stone-800 rounded-2xl p-5 border border-stone-200 dark:border-stone-700 flex items-center gap-4 hover:border-purple-500 transition-colors">
                                        <div class="w-10 h-10 rounded-xl bg-purple-100 dark:bg-purple-900/50 text-purple-600 flex items-center justify-center shrink-0">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-stone-500 font-bold uppercase tracking-wider">Market Demand</p>
                                            <p class="font-bold text-stone-900 dark:text-white">{{ collect($recommendation)->get('market_demand', 'N/A') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('cropForm', () => ({
                location: '{{ old('region') }}',
                loadingLocation: false,
                isSubmitting: false,

                detectLocation() {
                    this.loadingLocation = true;
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            (position) => {
                                const lat = position.coords.latitude;
                                const lon = position.coords.longitude;
                                fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${lat}&longitude=${lon}&localityLanguage=en`)
                                    .then(res => res.json())
                                    .then(data => {
                                        let loc = '';
                                        if (data.city) loc += data.city;
                                        if (data.principalSubdivision) loc += (loc ? ', ' : '') + data.principalSubdivision;
                                        this.location = loc || 'Location Detected';
                                        this.loadingLocation = false;
                                    })
                                    .catch(err => {
                                        console.error('Location fetch error:', err);
                                        this.loadingLocation = false;
                                        alert('Could not determine city name.');
                                    });
                            },
                            (err) => {
                                console.error('Geolocation error:', err);
                                this.loadingLocation = false;
                                alert('Geolocation failed. Please enter location manually.');
                            }
                        );
                    } else {
                        this.loadingLocation = false;
                        alert('Geolocation is not supported by your browser.');
                    }
                }
            }));
        });
    </script>
</x-app-layout>
