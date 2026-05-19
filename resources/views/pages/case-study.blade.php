@extends('layouts.pages')

@section('title', 'Case Study: Maharashtra Cooperative')

@section('content')
<div class="max-w-[900px] mx-auto px-6 py-12">
    <!-- Breadcrumb -->
    <nav class="mb-12">
        <a href="{{ route('media') }}" class="text-xs font-bold uppercase tracking-widest text-stone-400 hover:text-green-600 transition-colors">← Back to Media</a>
    </nav>

    <header class="mb-16">
        <div class="text-[10px] font-bold uppercase tracking-[0.2em] text-green-600 mb-6">Case Study • Agriculture</div>
        <h1 class="text-5xl font-bold text-stone-800 leading-tight mb-8">How AgroAI helped the Maharashtra Cooperative increase yield by 42%.</h1>
        <p class="text-xl text-stone-500 leading-relaxed italic">A transformation of 500 small-scale farms using real-time soil analytics and satellite tracking.</p>
    </header>

    <div class="aspect-video rounded-[40px] overflow-hidden mb-16 shadow-2xl border-8 border-white">
        <img src="/farmer_hero.png" alt="Maharashtra Farms" class="w-full h-full object-cover">
    </div>

    <div class="prose prose-stone max-w-none space-y-10 text-lg text-stone-600 leading-loose">
        <h2 class="text-3xl font-bold text-stone-800">The Challenge</h2>
        <p>Farmers in the Maharashtra region have long struggled with unpredictable monsoon patterns and late-season pest infestations that could destroy up to 30% of their crops in just 48 hours. Traditional methods of manual inspection were too slow for the scale of the cooperative's land.</p>

        <h2 class="text-3xl font-bold text-stone-800">The Solution</h2>
        <p>AgroAI deployed a network of 250 IoT soil sensors across the cooperative's main fields. These sensors provided real-time data on nitrogen levels, moisture content, and temperature. We integrated this with our proprietary satellite multi-spectral imaging to detect early-stage fungal growth invisible to the naked eye.</p>
        
        <div class="bg-stone-900 rounded-3xl p-10 text-white my-16 flex items-center gap-10">
            <div class="w-24 h-24 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                <span class="text-3xl font-bold">42%</span>
            </div>
            <div>
                <h4 class="text-xl font-bold mb-2">Measured Impact</h4>
                <p class="text-stone-400">Total yield increase across the 500 member farms in the first 12 months of deployment.</p>
            </div>
        </div>

        <h2 class="text-3xl font-bold text-stone-800">The Results</h2>
        <p>Beyond the 42% yield increase, the cooperative saw a 25% reduction in pesticide costs due to targeted application rather than broad spraying. "AgroAI didn't just give us data; they gave us a future," said the Cooperative President.</p>
    </div>
</div>
@endsection
