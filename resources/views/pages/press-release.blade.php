@extends('layouts.pages')

@section('title', 'Press Release: Series A Funding')

@section('content')
<div class="max-w-[900px] mx-auto px-6 py-12">
    <!-- Breadcrumb -->
    <nav class="mb-12">
        <a href="{{ route('media') }}" class="text-xs font-bold uppercase tracking-widest text-stone-400 hover:text-green-600 transition-colors">← Back to Media</a>
    </nav>

    <header class="mb-16">
        <div class="text-[10px] font-bold uppercase tracking-[0.2em] text-stone-400 mb-6">Press Release • August 15, 2025</div>
        <h1 class="text-5xl font-bold text-stone-800 leading-tight mb-8">AgroAI raises $15M to expand AI-driven sustainable agriculture globally.</h1>
        <div class="flex items-center gap-4 text-stone-500 font-bold text-sm">
            <span class="px-3 py-1 bg-stone-100 rounded">Business</span>
            <span class="px-3 py-1 bg-stone-100 rounded">Technology</span>
            <span>5 min read</span>
        </div>
    </header>

    <div class="prose prose-stone max-w-none space-y-10 text-lg text-stone-600 leading-loose">
        <p class="font-bold text-stone-800">SILICON VALLEY — August 15, 2025 — AgroAI, the leader in intelligent agricultural advisory services, today announced it has closed a $15 million Series A funding round led by GreenTerra Ventures, with participation from SeedCloud Capital and several prominent agronomists.</p>

        <p>The new capital will be used to accelerate the development of AgroAI's proprietary machine learning models and to expand operations into key markets in Southeast Asia and Africa. The company aims to bring its low-cost soil diagnostic kits and AI-driven insights to over 1 million small-holder farmers by the end of 2026.</p>

        <blockquote class="border-l-4 border-green-600 pl-8 my-12 italic text-2xl text-stone-800 font-bold">
            "Agriculture is at a crossroads. Climate change and resource depletion require us to farm smarter, not harder. This funding allows us to scale our 'AI-for-Soil' initiative to the regions that need it most."
            <footer class="text-sm font-bold uppercase tracking-widest text-stone-400 mt-4">— Phil Henderson, Founder & CEO</footer>
        </blockquote>

        <p>Since its founding, AgroAI has focused on making high-end agricultural science accessible to all. Its mobile platform, which operates in 12 local languages, provides farmers with real-time pest alerts, irrigation schedules, and crop health diagnostics using only a smartphone camera and localized IoT data.</p>

        <h3 class="text-2xl font-bold text-stone-800">About AgroAI</h3>
        <p>AgroAI is an agri-tech company dedicated to sustainable food security. By combining deep learning with traditional agronomy, AgroAI empowers farmers to increase yields, reduce chemical dependency, and restore soil health.</p>

        <div class="mt-20 pt-10 border-t border-stone-200">
            <h4 class="text-xs font-bold uppercase tracking-widest text-stone-400 mb-6">Media Contact</h4>
            <div class="flex items-center gap-4">
                <img src="https://ui-avatars.com/api/?name=PR+Team&background=random" class="w-12 h-12 rounded-full" alt="PR">
                <div>
                    <p class="font-bold text-stone-800">Press Relations Team</p>
                    <p class="text-sm">press@agroai.tech</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
