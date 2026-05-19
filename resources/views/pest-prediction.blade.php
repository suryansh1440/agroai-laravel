<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-stone-800 dark:text-stone-200 leading-tight">
            {{ __('AI Pest Guard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-stone-50 dark:bg-stone-950 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-stone-900 rounded-3xl border border-stone-200 dark:border-stone-800 overflow-hidden shadow-sm">
                <div class="p-8">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-red-100 dark:bg-red-900/50 rounded-2xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold dark:text-white">Pest Prediction</h3>
                            <p class="text-stone-500 text-sm">Analyze real-time weather and crop stage to predict potential pest risks.</p>
                        </div>
                    </div>

                    <form action="{{ route('pest.prediction') }}" method="POST" class="space-y-6" x-data="pestForm()" @submit="isSubmitting = true">
                        @csrf
                        <input type="hidden" name="temperature" x-model="temperature">
                        <input type="hidden" name="humidity" x-model="humidity">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 bg-stone-50 dark:bg-stone-800/50 rounded-2xl border border-stone-100 dark:border-stone-700">
                            <div>
                                <label class="block text-sm font-bold text-stone-700 dark:text-stone-300 mb-2">Crop Being Grown</label>
                                <input type="text" name="crop" placeholder="e.g. Rice, Wheat, Cotton" required class="w-full px-4 py-3 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-700 rounded-xl text-sm focus:ring-2 focus:ring-red-500 transition-all dark:text-white">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-stone-700 dark:text-stone-300 mb-2">Growth Stage</label>
                                <select name="stage" class="w-full px-4 py-3 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-700 rounded-xl text-sm focus:ring-2 focus:ring-red-500 transition-all dark:text-white">
                                    <option value="Seedling">Seedling</option>
                                    <option value="Vegetative">Vegetative (Leafy growth)</option>
                                    <option value="Flowering">Flowering</option>
                                    <option value="Fruiting">Fruiting / Grain Fill</option>
                                    <option value="Harvesting">Ready for Harvest</option>
                                </select>
                            </div>
                            
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-stone-700 dark:text-stone-300 mb-2">Location & Weather Data</label>
                                <div class="flex gap-2">
                                    <input type="text" name="city" x-model="location" placeholder="e.g. Ludhiana, Amravati" required class="w-full px-4 py-3 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-700 rounded-xl text-sm focus:ring-2 focus:ring-red-500 transition-all dark:text-white">
                                    <button type="button" @click="detectWeather()" class="px-6 py-3 bg-stone-200 hover:bg-stone-300 dark:bg-stone-700 dark:hover:bg-stone-600 text-stone-700 dark:text-stone-300 rounded-xl transition-all flex items-center justify-center font-bold whitespace-nowrap gap-2" title="Auto-detect Location & Weather">
                                        <span x-show="!loading" class="flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                                            Fetch Weather
                                        </span>
                                        <svg x-show="loading" class="w-5 h-5 animate-spin" style="display: none;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                    </button>
                                </div>
                                <div x-show="temperature !== ''" style="display: none;" class="mt-3 text-sm flex gap-4 text-green-600 dark:text-green-400 font-medium">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                        Temp: <span x-text="temperature + '°C'"></span>
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                                        Humidity: <span x-text="humidity + '%'"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <button type="submit" :disabled="isSubmitting" class="w-full py-4 bg-red-600 hover:bg-red-700 text-white rounded-2xl text-lg font-bold transition-all shadow-lg hover:shadow-red-500/25 flex items-center justify-center gap-2">
                            <span x-show="!isSubmitting">Analyze AI Pest Risk</span>
                            <span x-show="isSubmitting" style="display: none;" class="flex items-center gap-2">
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Assessing Threats...
                            </span>
                        </button>
                    </form>

                    <!-- Results Section -->
                    @isset($prediction)
                        <div class="mt-12 animate-fade-in">
                            <div class="flex items-center gap-3 mb-6">
                                <span class="w-8 h-1 bg-red-500 rounded-full"></span>
                                <h3 class="text-2xl font-bold dark:text-white">AI Risk Assessment</h3>
                                <span class="w-8 h-1 bg-red-500 rounded-full"></span>
                            </div>

                            @php
                                $pred = collect($prediction);
                                $risk = strtolower($pred->get('overall_risk', 'medium'));
                                $bgClass = $risk === 'high' ? 'from-red-500 to-rose-700' : ($risk === 'low' ? 'from-green-500 to-emerald-700' : 'from-amber-500 to-orange-700');
                            @endphp

                            <!-- Main Risk Header -->
                            <div class="bg-gradient-to-br {{ $bgClass }} rounded-3xl p-8 text-white shadow-xl mb-6 relative overflow-hidden group">
                                <div class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                <div class="relative z-10">
                                    <span class="bg-white/20 px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase backdrop-blur-sm mb-4 inline-block">Overall Threat Level</span>
                                    <h2 class="text-5xl font-extrabold mb-4 capitalize">{{ $pred->get('overall_risk', 'Medium') }} Risk</h2>
                                    <p class="text-white/90 leading-relaxed text-lg max-w-2xl">{{ $pred->get('summary', 'No summary provided.') }}</p>
                                </div>
                            </div>

                            <h4 class="font-bold text-stone-800 dark:text-stone-200 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                Identified Threats
                            </h4>

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                                @foreach($pred->get('pests', []) as $pest)
                                    @php
                                        $pestRisk = strtolower($pest['risk_level'] ?? 'medium');
                                        $iconColor = $pestRisk === 'high' ? 'text-red-600 bg-red-100 dark:bg-red-900/50' : ($pestRisk === 'low' ? 'text-green-600 bg-green-100 dark:bg-green-900/50' : 'text-amber-600 bg-amber-100 dark:bg-amber-900/50');
                                    @endphp
                                    <div class="bg-stone-50 dark:bg-stone-800 rounded-3xl p-6 border border-stone-200 dark:border-stone-700 flex flex-col h-full">
                                        <div class="flex items-start justify-between mb-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 rounded-xl {{ $iconColor }} flex items-center justify-center shrink-0">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                                </div>
                                                <h5 class="font-bold text-stone-900 dark:text-white text-lg">{{ $pest['name'] ?? 'Unknown' }}</h5>
                                            </div>
                                            <span class="px-2 py-1 text-xs font-bold rounded uppercase tracking-wider {{ $pestRisk === 'high' ? 'bg-red-100 text-red-700' : ($pestRisk === 'low' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700') }}">
                                                {{ $pest['risk_level'] ?? 'Med' }}
                                            </span>
                                        </div>
                                        
                                        <div class="mb-4 text-sm text-stone-600 dark:text-stone-400 bg-white dark:bg-stone-900/50 p-3 rounded-xl border border-stone-100 dark:border-stone-700">
                                            <span class="block font-bold text-xs uppercase text-stone-400 mb-1">Weather Factor:</span>
                                            {{ $pest['weather_factor'] ?? 'N/A' }}
                                        </div>

                                        <div class="mt-auto">
                                            <span class="block font-bold text-xs uppercase text-stone-400 mb-2">Preventive Measures:</span>
                                            <ul class="space-y-2">
                                                @foreach($pest['preventive_measures'] ?? [] as $measure)
                                                    <li class="flex items-start gap-2 text-stone-700 dark:text-stone-300 text-sm">
                                                        <svg class="w-4 h-4 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                                        <span class="leading-snug">{{ $measure }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('pestForm', () => ({
                location: '{{ old('city') }}',
                temperature: '',
                humidity: '',
                loading: false,
                isSubmitting: false,

                detectWeather() {
                    this.loading = true;
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            (position) => {
                                const lat = position.coords.latitude;
                                const lon = position.coords.longitude;
                                
                                // Reverse geocoding for city name
                                fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${lat}&longitude=${lon}&localityLanguage=en`)
                                    .then(res => res.json())
                                    .then(data => {
                                        let loc = '';
                                        if (data.city) loc += data.city;
                                        if (data.principalSubdivision) loc += (loc ? ', ' : '') + data.principalSubdivision;
                                        this.location = loc || 'Location Detected';
                                    });

                                // Weather fetching via Open-Meteo
                                fetch(`https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current=temperature_2m,relative_humidity_2m`)
                                    .then(res => res.json())
                                    .then(data => {
                                        if(data && data.current) {
                                            this.temperature = data.current.temperature_2m;
                                            this.humidity = data.current.relative_humidity_2m;
                                        }
                                        this.loading = false;
                                    })
                                    .catch(err => {
                                        console.error('Weather fetch error:', err);
                                        this.loading = false;
                                        alert('Could not fetch weather data.');
                                    });
                            },
                            (err) => {
                                console.error('Geolocation error:', err);
                                this.loading = false;
                                alert('Geolocation failed. Please enter city manually.');
                            }
                        );
                    } else {
                        this.loading = false;
                        alert('Geolocation is not supported by your browser.');
                    }
                }
            }));
        });
    </script>
</x-app-layout>
