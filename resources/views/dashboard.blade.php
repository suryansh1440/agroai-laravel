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

            <!-- Feature Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <!-- Crop Recommendation Card -->
                <a href="{{ route('crop.recommendation') }}" class="group p-6 bg-white dark:bg-stone-900 rounded-3xl border border-stone-200 dark:border-stone-800 hover:border-green-500 transition-all shadow-sm hover:shadow-xl">
                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900/50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2 dark:text-white">Crop Advisor</h3>
                    <p class="text-stone-500 text-sm leading-relaxed mb-4">Get AI-powered crop suggestions based on your soil type.</p>
                    <span class="text-green-600 font-bold text-xs inline-flex items-center gap-1 group-hover:gap-2 transition-all">Launch AI <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></span>
                </a>

                <!-- Pest Prediction Card -->
                <a href="{{ route('pest.prediction') }}" class="group p-6 bg-white dark:bg-stone-900 rounded-3xl border border-stone-200 dark:border-stone-800 hover:border-red-500 transition-all shadow-sm hover:shadow-xl">
                    <div class="w-12 h-12 bg-red-100 dark:bg-red-900/50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2 dark:text-white">Pest Guard</h3>
                    <p class="text-stone-500 text-sm leading-relaxed mb-4">Predict and prevent pest outbreaks before they happen.</p>
                    <span class="text-red-600 font-bold text-xs inline-flex items-center gap-1 group-hover:gap-2 transition-all">Check Risks <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></span>
                </a>

                <!-- Irrigation Tips Card -->
                <a href="{{ route('irrigation.tips') }}" class="group p-6 bg-white dark:bg-stone-900 rounded-3xl border border-stone-200 dark:border-stone-800 hover:border-blue-500 transition-all shadow-sm hover:shadow-xl">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2 dark:text-white">AquaFlow</h3>
                    <p class="text-stone-500 text-sm leading-relaxed mb-4">Smart watering tips based on real-time weather forecasts.</p>
                    <span class="text-blue-600 font-bold text-xs inline-flex items-center gap-1 group-hover:gap-2 transition-all">Optimize Water <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></span>
                </a>

                <!-- Chatbot Card -->
                <a href="{{ route('chatbot') }}" class="group p-6 bg-white dark:bg-stone-900 rounded-3xl border border-stone-200 dark:border-stone-800 hover:border-purple-500 transition-all shadow-sm hover:shadow-xl">
                    <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2 dark:text-white">Agro Chat</h3>
                    <p class="text-stone-500 text-sm leading-relaxed mb-4">Talk to AI in English, Hindi, or Punjabi for expert advice.</p>
                    <span class="text-purple-600 font-bold text-xs inline-flex items-center gap-1 group-hover:gap-2 transition-all">Start Chatting <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></span>
                </a>
            </div>

            <!-- Quick Stats/Insights -->
            <div class="bg-white dark:bg-stone-900 rounded-3xl border border-stone-200 dark:border-stone-800 p-8 shadow-sm">
                <h3 class="text-xl font-bold mb-6 dark:text-white">Recent Farm Insights</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-stone-50 dark:bg-stone-800 rounded-2xl border border-stone-100 dark:border-stone-700">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-sm dark:text-white">Weather Alert</h4>
                                <p class="text-xs text-stone-500">Expect light rain in the next 48 hours. Adjust irrigation accordingly.</p>
                            </div>
                        </div>
                        <span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest">2h ago</span>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-stone-50 dark:bg-stone-800 rounded-2xl border border-stone-100 dark:border-stone-700">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-orange-100 dark:bg-orange-900/50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-sm dark:text-white">Soil Health</h4>
                                <p class="text-xs text-stone-500">Your last soil test indicates nitrogen levels are optimal for Wheat.</p>
                            </div>
                        </div>
                        <span class="text-[10px] font-bold text-stone-400 uppercase tracking-widest">Yesterday</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
