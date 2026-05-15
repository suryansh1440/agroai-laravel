@extends('layouts.pages')

@section('title', 'Farmer Groups')

@section('content')
<div class="max-w-[1200px] mx-auto px-12">
    <div class="mb-20 text-center">
        <h1 class="text-6xl font-bold text-stone-800 tracking-tight leading-tight mb-8">Better Farming <br> <span class="text-green-600">Through Community</span></h1>
        <p class="text-xl text-stone-500 max-w-2xl mx-auto leading-relaxed">AgroAI Groups allow local farming communities to pool data, share resources, and negotiate better market rates together.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-32">
        <div class="premium-card p-10 rounded-3xl">
            <h3 class="text-2xl font-bold mb-4">Collective Insights</h3>
            <p class="text-stone-500 leading-relaxed">Analyze soil trends across your entire region to identify large-scale patterns before they affect your crop.</p>
        </div>
        <div class="premium-card p-10 rounded-3xl">
            <h3 class="text-2xl font-bold mb-4">Resource Pooling</h3>
            <p class="text-stone-500 leading-relaxed">Coordinate drone flights, equipment rentals, and irrigation schedules to minimize costs for everyone.</p>
        </div>
        <div class="premium-card p-10 rounded-3xl">
            <h3 class="text-2xl font-bold mb-4">Market Leverage</h3>
            <p class="text-stone-500 leading-relaxed">Use group yield predictions to negotiate stronger prices with buyers months in advance.</p>
        </div>
    </div>

    <div class="bg-[#0d2c1e] rounded-[50px] p-20 text-white relative overflow-hidden">
        <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div>
                <h2 class="text-5xl font-bold leading-tight mb-8">Ready to start a local group?</h2>
                <p class="text-green-200/70 text-lg mb-10">Download our Community Toolkit and invite your neighbors to the future of agriculture.</p>
                <div class="flex gap-4">
                    <button class="px-8 py-4 bg-green-500 hover:bg-green-400 text-stone-900 rounded-xl font-bold transition-all">Download Toolkit</button>
                    <button class="px-8 py-4 border border-white/20 hover:bg-white/10 rounded-xl font-bold transition-all">Learn More</button>
                </div>
            </div>
            <div class="hidden lg:block">
                <div class="grid grid-cols-2 gap-4">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="aspect-square bg-white/5 rounded-2xl border border-white/10 flex items-center justify-center">
                             <img src="https://ui-avatars.com/api/?name=Group+Member&background=random" class="w-16 h-16 rounded-full opacity-50" alt="Member">
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
