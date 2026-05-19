<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-stone-800 dark:text-stone-200 leading-tight">
                {{ __('Farmer Dashboard') }}
            </h2>
            <div class="flex items-center gap-2 px-4 py-1.5 bg-green-100 dark:bg-green-900/30 rounded-full border border-green-200 dark:border-green-800">
                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                <span class="text-xs font-bold text-green-700 dark:text-green-400">AI System Online</span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-stone-50 dark:bg-stone-950 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Header -->
            <div class="mb-10">
                <h1 class="text-3xl font-bold text-stone-900 dark:text-white mb-2">Welcome back, {{ Auth::user()->name }}! 👋</h1>
                <p class="text-stone-500 dark:text-stone-400">Here's what's happening with your farm today.</p>
            </div>



            <!-- Dynamic Data Hub (Weather & Market) -->
            <div x-data="dashboardData()" class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">
                
                <!-- Weather Widget -->
                <div class="bg-white dark:bg-stone-900 rounded-3xl border border-stone-200 dark:border-stone-800 p-8 shadow-sm flex flex-col justify-between relative overflow-hidden group hover:border-blue-500 transition-all hover:shadow-xl">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/50 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                        </div>
                        <div x-show="weatherLoading" class="w-6 h-6 border-2 border-stone-600 border-t-blue-500 rounded-full animate-spin" style="display: none;"></div>
                    </div>
                    
                    <h3 class="text-xl font-bold dark:text-white mb-2">Current Weather</h3>
                    <div x-show="!weatherLoading" class="flex flex-col gap-1" style="display: none;">
                        <div class="flex items-end gap-4">
                            <span class="text-4xl font-bold text-stone-900 dark:text-white" x-text="weather ? weather.temperature + '°C' : '--'"></span>
                            <span class="text-sm text-stone-500 mb-1" x-text="weather ? 'Wind: ' + weather.windspeed + ' km/h' : ''"></span>
                        </div>
                        <div class="flex items-center gap-1 text-sm text-stone-500 mt-1 font-medium" x-show="locationName">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span x-text="locationName"></span>
                        </div>
                    </div>
                    <div x-show="weatherLoading" class="text-stone-500 animate-pulse text-xl">Detecting location...</div>
                    <p class="text-stone-500 text-sm leading-relaxed mt-4">Real-time localized weather data for optimal farm operations.</p>
                </div>

                <!-- Market Trends Widget -->
                <div class="bg-white dark:bg-stone-900 rounded-3xl border border-stone-200 dark:border-stone-800 p-8 shadow-sm group hover:border-amber-500 transition-all hover:shadow-xl">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-12 h-12 bg-amber-100 dark:bg-amber-900/50 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold dark:text-white mb-2">Market Prices</h3>
                    
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <template x-for="crop in marketData" :key="crop.name">
                            <div class="flex items-center justify-between p-3 bg-stone-50 dark:bg-stone-800 rounded-xl border border-stone-100 dark:border-stone-700">
                                <div>
                                    <span class="text-xs text-stone-500 dark:text-stone-400 block" x-text="crop.name"></span>
                                    <span class="font-bold text-stone-900 dark:text-white" x-text="crop.price"></span>
                                </div>
                                <div :class="crop.trend === 'up' ? 'text-green-500 bg-green-100 dark:bg-green-900/30' : 'text-red-500 bg-red-100 dark:bg-red-900/30'" class="px-2 py-1 rounded flex items-center gap-1 text-[10px] font-bold">
                                    <svg x-show="crop.trend === 'up'" class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                                    <svg x-show="crop.trend === 'down'" class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                                    <span x-text="crop.change"></span>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

            </div>

            <!-- Insights & Schemes Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Quick Stats/Insights -->
                <div class="bg-white dark:bg-stone-900 rounded-3xl border border-stone-200 dark:border-stone-800 p-8 shadow-sm flex flex-col">
                    <h3 class="text-xl font-bold mb-6 dark:text-white">Recent Farm Insights</h3>
                    <div class="space-y-4 flex-1">
                        @forelse($insights as $insight)
                        <div class="flex items-center justify-between p-4 bg-stone-50 dark:bg-stone-800 rounded-2xl border border-stone-100 dark:border-stone-700">
                            <div class="flex items-center gap-4">
                                @if($insight->type === 'weather')
                                    <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/50 rounded-xl flex items-center justify-center">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                                    </div>
                                @elseif($insight->type === 'soil')
                                    <div class="w-10 h-10 bg-orange-100 dark:bg-orange-900/50 rounded-xl flex items-center justify-center">
                                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                    </div>
                                @elseif($insight->type === 'pest')
                                    <div class="w-10 h-10 bg-red-100 dark:bg-red-900/50 rounded-xl flex items-center justify-center">
                                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                    </div>
                                @else
                                    <div class="w-10 h-10 bg-stone-100 dark:bg-stone-900/50 rounded-xl flex items-center justify-center">
                                        <svg class="w-5 h-5 text-stone-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                @endif
                                <div>
                                    <h4 class="font-bold text-sm dark:text-white">{{ $insight->title }}</h4>
                                    <p class="text-xs text-stone-500">{{ $insight->message }}</p>
                                </div>
                            </div>
                            <span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest min-w-[60px] text-right">{{ $insight->created_at->diffForHumans() }}</span>
                        </div>
                        @empty
                        <div class="p-4 text-center text-stone-500 text-sm h-full flex items-center justify-center">
                            No recent insights available.
                        </div>
                        @endforelse
                    </div>
                </div>

                <!-- Active Govt Schemes -->
                <div class="bg-white dark:bg-stone-900 rounded-3xl border border-stone-200 dark:border-stone-800 p-8 shadow-sm flex flex-col">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold dark:text-white">Active Govt Schemes</h3>
                        <span class="px-3 py-1 bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 rounded-full text-[10px] font-bold tracking-wider uppercase animate-pulse">Live Feed</span>
                    </div>
                    <div class="space-y-4 flex-1">
                        <!-- PM-Kisan -->
                        <a href="https://pmkisan.gov.in/" target="_blank" class="group block p-4 bg-stone-50 dark:bg-stone-800 rounded-2xl border border-stone-100 dark:border-stone-700 hover:border-green-500 dark:hover:border-green-500 transition-all cursor-pointer shadow-sm hover:shadow-md">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-bold text-sm dark:text-white group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">PM-Kisan Samman Nidhi</h4>
                                    <p class="text-xs text-stone-500 mt-1 line-clamp-2 leading-relaxed">₹6,000 per year income support for all landholding farmers. Check your next installment status.</p>
                                </div>
                                <svg class="w-4 h-4 text-stone-400 group-hover:text-green-500 transform group-hover:-translate-y-1 group-hover:translate-x-1 transition-all shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </div>
                            <div class="mt-3 flex gap-2">
                                <span class="text-[10px] bg-white dark:bg-stone-900 px-2 py-1 rounded text-stone-500 border border-stone-200 dark:border-stone-700 font-medium">Financial Aid</span>
                                <span class="text-[10px] bg-white dark:bg-stone-900 px-2 py-1 rounded text-stone-500 border border-stone-200 dark:border-stone-700 font-medium">All States</span>
                            </div>
                        </a>

                        <!-- PMFBY -->
                        <a href="https://pmfby.gov.in/" target="_blank" class="group block p-4 bg-stone-50 dark:bg-stone-800 rounded-2xl border border-stone-100 dark:border-stone-700 hover:border-blue-500 dark:hover:border-blue-500 transition-all cursor-pointer shadow-sm hover:shadow-md">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-bold text-sm dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">PMFBY Crop Insurance</h4>
                                    <p class="text-xs text-stone-500 mt-1 line-clamp-2 leading-relaxed">Protect your crops against natural calamities. Premium subvention available for Kharif 2026.</p>
                                </div>
                                <svg class="w-4 h-4 text-stone-400 group-hover:text-blue-500 transform group-hover:-translate-y-1 group-hover:translate-x-1 transition-all shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </div>
                            <div class="mt-3 flex gap-2">
                                <span class="text-[10px] bg-white dark:bg-stone-900 px-2 py-1 rounded text-stone-500 border border-stone-200 dark:border-stone-700 font-medium">Insurance</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dashboardData', () => ({
                weather: null,
                weatherLoading: true,
                locationName: null,
                marketData: [
                    { name: 'Wheat', price: '₹2,300', trend: 'up', change: '+2.1%' },
                    { name: 'Rice', price: '₹3,150', trend: 'up', change: '+1.5%' },
                    { name: 'Cotton', price: '₹6,200', trend: 'down', change: '-0.8%' },
                    { name: 'Sugarcane', price: '₹315', trend: 'up', change: '+0.5%' }
                ],
                
                init() {
                    this.fetchWeather();
                },
                
                fetchWeather() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            (position) => {
                                const lat = position.coords.latitude;
                                const lon = position.coords.longitude;
                                this.getWeatherData(lat, lon);
                            },
                            (err) => {
                                console.error('Geolocation error:', err);
                                // Fallback to New Delhi
                                this.getWeatherData(28.6139, 77.2090);
                            }
                        );
                    } else {
                        this.getWeatherData(28.6139, 77.2090);
                    }
                },

                getWeatherData(lat, lon) {
                    // Fetch weather
                    fetch(`https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current_weather=true&timezone=auto`)
                        .then(res => res.json())
                        .then(data => {
                            this.weather = data.current_weather;
                            this.weatherLoading = false;
                        })
                        .catch(err => {
                            console.error('Weather fetch error:', err);
                            this.weatherLoading = false;
                        });

                    // Fetch location name
                    fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${lat}&longitude=${lon}&localityLanguage=en`)
                        .then(res => res.json())
                        .then(data => {
                            let loc = '';
                            if (data.city) loc += data.city;
                            if (data.principalSubdivision) loc += (loc ? ', ' : '') + data.principalSubdivision;
                            this.locationName = loc || 'Unknown Location';
                        })
                        .catch(err => console.error('Location fetch error:', err));
                }
            }));
        });
    </script>
</x-app-layout>
