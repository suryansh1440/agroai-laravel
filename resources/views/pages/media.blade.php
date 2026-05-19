@extends('layouts.pages')

@section('title', 'Media Kit')

@section('content')
<div class="max-w-[1200px] mx-auto px-6 pt-12">
    <div class="mb-16 text-center">
        <h1 class="text-5xl font-bold text-stone-800 tracking-tight leading-tight mb-6">Latest from <br> <span class="text-green-600">The Field</span></h1>
        <p class="text-xl text-stone-500 max-w-2xl mx-auto leading-relaxed">Stay updated with AgroAI's press releases, case studies, and brand assets.</p>
    </div>

    <!-- Featured Stories with Real Data -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-24">
        <!-- Case Study -->
        <div class="bg-stone-900 rounded-[32px] p-10 text-white relative group overflow-hidden flex flex-col justify-between h-[450px]">
            <div class="relative z-10">
                <div class="text-[10px] font-bold uppercase tracking-[0.2em] text-green-400 mb-6">Case Study • Sept 2025</div>
                <h2 class="text-3xl font-bold mb-6 leading-tight">How AgroAI helped the Maharashtra Cooperative increase yield by 42%.</h2>
                <p class="text-stone-400 text-sm leading-relaxed mb-8">By implementing real-time soil moisture sensors and satellite-based pest tracking, over 500 small-scale farmers optimized their harvest timing.</p>
            </div>
            <div class="relative z-10">
                <a href="{{ route('case-study.maharashtra') }}" class="inline-flex items-center gap-2 font-bold text-xs uppercase tracking-widest text-green-400 hover:text-green-300 transition-colors">
                    Read Full Story
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
            <!-- Decorative Background Element -->
            <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-green-500/10 rounded-full blur-3xl group-hover:bg-green-500/20 transition-all duration-700"></div>
        </div>

        <!-- Press Release -->
        <div class="bg-white border border-stone-200 rounded-[32px] p-10 relative group overflow-hidden flex flex-col justify-between h-[450px]">
            <div class="relative z-10">
                <div class="text-[10px] font-bold uppercase tracking-[0.2em] text-stone-400 mb-6">Press Release • Aug 2025</div>
                <h2 class="text-3xl font-bold text-stone-800 mb-6 leading-tight">AgroAI raises $15M to expand AI-driven sustainable agriculture globally.</h2>
                <p class="text-stone-500 text-sm leading-relaxed mb-8">Series A funding led by GreenTerra Ventures will accelerate the deployment of low-cost soil diagnostic kits across Southeast Asia and Africa.</p>
            </div>
            <div class="relative z-10">
                <a href="{{ route('press-release.funding') }}" class="inline-flex items-center gap-2 font-bold text-xs uppercase tracking-widest text-stone-900 hover:text-green-600 transition-colors">
                    View Release
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Media Library / Brand Assets -->
    <div class="bg-stone-50 rounded-[40px] p-12 border border-stone-200">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-12">
            <div>
                <h3 class="text-2xl font-bold text-stone-800 mb-4">Official Brand Assets</h3>
                <p class="text-stone-500 max-w-md leading-relaxed">Download our high-resolution logos, product screenshots, and executive headshots for media coverage.</p>
                <div class="flex flex-wrap gap-4 mt-8">
                    <span class="px-4 py-2 bg-white border border-stone-200 rounded-full text-[10px] font-bold text-stone-600 uppercase tracking-widest">SVG Logo</span>
                    <span class="px-4 py-2 bg-white border border-stone-200 rounded-full text-[10px] font-bold text-stone-600 uppercase tracking-widest">PNG Assets</span>
                    <span class="px-4 py-2 bg-white border border-stone-200 rounded-full text-[10px] font-bold text-stone-600 uppercase tracking-widest">Style Guide</span>
                </div>
            </div>
            <div class="w-full lg:w-auto">
                <button class="w-full lg:w-auto px-10 py-5 bg-[#0d2c1e] text-white rounded-2xl font-bold uppercase tracking-widest shadow-xl shadow-green-950/20 hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Download Kit (45MB)
                </button>
            </div>
        </div>
    </div>

    <!-- Recent News List -->
    <div class="mt-24 mb-24">
        <h3 class="text-xl font-bold text-stone-800 mb-10 uppercase tracking-widest text-center">Recent Updates</h3>
        <div class="space-y-6">
            @foreach([
                ['date' => 'July 15, 2025', 'title' => 'AgroAI Partners with UN Food Program for Drought Mitigation'],
                ['date' => 'June 22, 2025', 'title' => 'New Software Update: Real-time Multi-spectral Analysis Now Live'],
                ['date' => 'May 05, 2025', 'title' => 'Founder Phil Henderson Named One of Top 50 Agri-Tech Innovators']
            ] as $news)
            <div class="p-6 bg-white border border-stone-100 rounded-2xl flex flex-col md:flex-row md:items-center justify-between hover:border-green-200 transition-colors group cursor-pointer shadow-sm">
                <div class="flex items-center gap-6">
                    <span class="text-xs font-bold text-stone-400 uppercase tracking-widest w-32">{{ $news['date'] }}</span>
                    <h4 class="text-lg font-bold text-stone-700 group-hover:text-green-600 transition-colors">{{ $news['title'] }}</h4>
                </div>
                <svg class="w-5 h-5 text-stone-300 group-hover:text-green-500 transition-colors hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
