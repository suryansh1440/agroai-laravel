<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-stone-800 dark:text-stone-200 leading-tight">
            {{ __('AI AquaFlow') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-stone-50 dark:bg-stone-950 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-stone-900 rounded-3xl border border-stone-200 dark:border-stone-800 overflow-hidden shadow-sm">
                <div class="p-8">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/50 rounded-2xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold dark:text-white">Smart Irrigation</h3>
                            <p class="text-stone-500 text-sm">Optimize your water usage based on soil type and live rainfall forecasts.</p>
                        </div>
                    </div>

                    <form action="{{ route('irrigation.tips') }}" method="POST" class="space-y-6" x-data="aquaForm()" @submit="isSubmitting = true">
                        @csrf
                        <input type="hidden" name="temperature" x-model="temperature">
                        <input type="hidden" name="precipitation" x-model="precipitation">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 bg-stone-50 dark:bg-stone-800/50 rounded-2xl border border-stone-100 dark:border-stone-700">
                            <div>
                                <label class="block text-sm font-bold text-stone-700 dark:text-stone-300 mb-2">Crop Type</label>
                                <input type="text" name="crop" placeholder="e.g. Maize, Sugarcane" required class="w-full px-4 py-3 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-700 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 transition-all dark:text-white">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-stone-700 dark:text-stone-300 mb-2">Soil Type</label>
                                <select name="soil" class="w-full px-4 py-3 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-700 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 transition-all dark:text-white">
                                    <option value="Sandy">Sandy (Drains quickly)</option>
                                    <option value="Loamy">Loamy (Balanced retention)</option>
                                    <option value="Clay">Clay (Holds water long)</option>
                                    <option value="Silty">Silty (Moderate retention)</option>
                                    <option value="Peaty">Peaty (High organic matter)</option>
                                </select>
                            </div>
                            
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-stone-700 dark:text-stone-300 mb-2">Location & Weather Data</label>
                                <div class="flex gap-2">
                                    <input type="text" name="city" x-model="location" placeholder="e.g. Surat, Indore" required class="w-full px-4 py-3 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-700 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 transition-all dark:text-white">
                                    <button type="button" @click="detectWeather()" class="px-6 py-3 bg-stone-200 hover:bg-stone-300 dark:bg-stone-700 dark:hover:bg-stone-600 text-stone-700 dark:text-stone-300 rounded-xl transition-all flex items-center justify-center font-bold whitespace-nowrap gap-2" title="Auto-detect Location & Weather">
                                        <span x-show="!loading" class="flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                                            Fetch Weather
                                        </span>
                                        <svg x-show="loading" class="w-5 h-5 animate-spin" style="display: none;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                    </button>
                                </div>
                                <div x-show="temperature !== ''" style="display: none;" class="mt-3 text-sm flex gap-4 text-blue-600 dark:text-blue-400 font-medium">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                        Temp: <span x-text="temperature + '°C'"></span>
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 8.966l-6.381 2.37-3.805-4.148c-.689-.75-1.921-.75-2.61 0l-4.708 5.133A2.998 2.998 0 002 14.5c0 1.657 1.343 3 3 3h14a3 3 0 003-3c0-.62-.185-1.196-.5-1.674L20 8.966z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v2m0 16v2M4.929 4.929l1.414 1.414m11.314 11.314l1.414 1.414M2 12h2m16 0h2M4.929 19.071l1.414-1.414m11.314-11.314l1.414-1.414"></path></svg>
                                        Precipitation: <span x-text="precipitation + ' mm'"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <button type="submit" :disabled="isSubmitting" class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl text-lg font-bold transition-all shadow-lg hover:shadow-blue-500/25 flex items-center justify-center gap-2">
                            <span x-show="!isSubmitting">Get Irrigation Tips</span>
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
                    @isset($tips)
                        <div class="mt-12 animate-fade-in">
                            <div class="flex items-center gap-3 mb-6">
                                <span class="w-8 h-1 bg-blue-500 rounded-full"></span>
                                <h3 class="text-2xl font-bold dark:text-white">AI Irrigation Analysis</h3>
                                <span class="w-8 h-1 bg-blue-500 rounded-full"></span>
                            </div>

                            @php
                                $pred = collect($tips);
                                $waterReq = strtolower($pred->get('water_requirement', 'medium'));
                                $bgClass = $waterReq === 'high' ? 'from-amber-500 to-orange-700' : ($waterReq === 'low' || $waterReq === 'none' ? 'from-green-500 to-emerald-700' : 'from-blue-500 to-cyan-700');
                            @endphp

                            <!-- Main Risk Header -->
                            <div class="bg-gradient-to-br {{ $bgClass }} rounded-3xl p-8 text-white shadow-xl mb-6 relative overflow-hidden group">
                                <div class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                <div class="relative z-10">
                                    <span class="bg-white/20 px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase backdrop-blur-sm mb-4 inline-block">Water Requirement</span>
                                    <h2 class="text-5xl font-extrabold mb-4 capitalize">{{ $pred->get('water_requirement', 'Medium') }} Need</h2>
                                    <p class="text-white/90 leading-relaxed text-lg max-w-2xl">{{ $pred->get('summary', 'No summary provided.') }}</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                                <!-- Warnings Column -->
                                <div class="lg:col-span-1 space-y-4">
                                    <h4 class="font-bold text-stone-800 dark:text-stone-200 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                        Alerts & Warnings
                                    </h4>
                                    @foreach($pred->get('warnings', []) as $warning)
                                        <div class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded-2xl p-4 text-sm text-amber-800 dark:text-amber-200 flex gap-3 items-start">
                                            <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <p>{{ $warning }}</p>
                                        </div>
                                    @endforeach
                                    @if(empty($pred->get('warnings')))
                                        <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-2xl p-4 text-sm text-green-800 dark:text-green-200 flex gap-3 items-start">
                                            <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <p>No critical warnings. Conditions are favorable.</p>
                                        </div>
                                    @endif
                                </div>

                                <!-- Schedule Column -->
                                <div class="lg:col-span-2 space-y-4">
                                    <h4 class="font-bold text-stone-800 dark:text-stone-200 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Recommended Schedule
                                    </h4>
                                    
                                    <div class="space-y-3">
                                        @foreach($pred->get('schedule', []) as $schedule)
                                            <div class="bg-white dark:bg-stone-800 border border-stone-200 dark:border-stone-700 rounded-2xl p-5 shadow-sm flex flex-col sm:flex-row sm:items-center gap-4">
                                                <div class="bg-blue-100 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300 font-bold px-4 py-2 rounded-xl text-sm shrink-0 text-center">
                                                    {{ $schedule['time'] ?? 'Anytime' }}
                                                </div>
                                                <p class="text-stone-700 dark:text-stone-300 text-sm leading-relaxed">
                                                    {{ $schedule['action'] ?? 'N/A' }}
                                                </p>
                                            </div>
                                        @endforeach
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
            Alpine.data('aquaForm', () => ({
                location: '{{ old('city') }}',
                temperature: '',
                precipitation: '',
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
                                fetch(`https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current=temperature_2m,precipitation`)
                                    .then(res => res.json())
                                    .then(data => {
                                        if(data && data.current) {
                                            this.temperature = data.current.temperature_2m;
                                            this.precipitation = data.current.precipitation;
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
