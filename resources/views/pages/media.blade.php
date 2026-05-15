@extends('layouts.pages')

@section('title', 'Media Kit')

@section('content')
<div class="max-w-[1200px] mx-auto px-12">
    <div class="mb-24 text-center">
        <h1 class="text-6xl font-bold text-stone-800 tracking-tight leading-tight mb-8">Latest from <br> <span class="text-green-600">The Field</span></h1>
        <p class="text-xl text-stone-500 max-w-2xl mx-auto leading-relaxed">Stay updated with AgroAI's press releases, case studies, and brand assets.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-32">
        <div class="bg-stone-900 rounded-[40px] p-12 text-white relative group overflow-hidden">
            <div class="relative z-10">
                <div class="text-xs font-bold uppercase tracking-widest text-green-400 mb-6">Case Study</div>
                <h2 class="text-4xl font-bold mb-8">How AgroAI helped the Maharashtra Cooperative increase yield by 42%.</h2>
                <button class="flex items-center gap-2 font-bold text-sm uppercase tracking-widest hover:text-green-400 transition-colors">
                    Read Story
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>
            <div class="absolute top-0 right-0 w-64 h-64 bg-green-500/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        </div>

        <div class="bg-white border border-stone-200 rounded-[40px] p-12 relative group overflow-hidden">
            <div class="relative z-10">
                <div class="text-xs font-bold uppercase tracking-widest text-stone-400 mb-6">Press Release</div>
                <h2 class="text-4xl font-bold text-stone-800 mb-8">AgroAI raises $15M to expand AI-driven sustainable agriculture globally.</h2>
                <button class="flex items-center gap-2 font-bold text-sm uppercase tracking-widest text-stone-900 hover:text-green-600 transition-colors">
                    View Release
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>
        </div>
    </div>

    <div class="premium-card rounded-[40px] p-16">
        <div class="flex flex-col md:flex-row justify-between items-center gap-12">
            <div>
                <h3 class="text-3xl font-bold text-stone-800 mb-4">Brand Assets</h3>
                <p class="text-stone-500 max-w-md leading-relaxed">Download our official logos, brand guidelines, and high-resolution photography for media use.</p>
            </div>
            <button class="px-10 py-5 bg-[#0d2c1e] text-white rounded-2xl font-bold uppercase tracking-widest shadow-xl shadow-green-950/20 hover:-translate-y-1 transition-all">Download Media Kit (45MB)</button>
        </div>
    </div>
</div>
@endsection
