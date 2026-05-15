@extends('layouts.pages')

@section('title', 'Why AgroAI?')

@section('content')
<div class="max-w-[1200px] mx-auto px-12">
    <div class="mb-24 text-center">
        <h1 class="text-6xl font-bold text-stone-800 tracking-tight leading-tight mb-8">The Smart Choice for <br> <span class="text-green-600">Modern Agriculture</span></h1>
        <p class="text-xl text-stone-500 max-w-2xl mx-auto leading-relaxed">Why do the world's most progressive farms choose AgroAI? Because we deliver results you can see in your soil and your balance sheet.</p>
    </div>

    <div class="space-y-32">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div>
                <div class="w-16 h-16 bg-green-600 text-white rounded-2xl flex items-center justify-center mb-10 shadow-xl shadow-green-600/20">
                    <span class="text-2xl font-bold">01</span>
                </div>
                <h2 class="text-4xl font-bold text-stone-800 mb-6">Precision Beyond Human Limits</h2>
                <p class="text-lg text-stone-600 leading-relaxed mb-8">Our AI analyzes over 50 variables—from micro-climates to satellite multispectral data—providing a resolution of insight that traditional methods simply cannot match.</p>
                <ul class="space-y-4">
                    <li class="flex items-center gap-3 font-bold text-stone-700">
                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        98% Accuracy in Crop Health Prediction
                    </li>
                    <li class="flex items-center gap-3 font-bold text-stone-700">
                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        Real-time Weather Risk Mitigation
                    </li>
                </ul>
            </div>
            <div class="rounded-3xl overflow-hidden shadow-2xl">
                <img src="/pest_prevention.png" alt="Precision" class="w-full h-full object-cover">
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div class="order-2 lg:order-1 rounded-3xl overflow-hidden shadow-2xl">
                <img src="/foggy_field.png" alt="Sustainability" class="w-full h-full object-cover">
            </div>
            <div class="order-1 lg:order-2">
                <div class="w-16 h-16 bg-blue-600 text-white rounded-2xl flex items-center justify-center mb-10 shadow-xl shadow-blue-600/20">
                    <span class="text-2xl font-bold">02</span>
                </div>
                <h2 class="text-4xl font-bold text-stone-800 mb-6">Sustainable Profitability</h2>
                <p class="text-lg text-stone-600 leading-relaxed mb-8">We don't just help you grow more; we help you grow better. By optimizing resource use, our farmers see an average of 25% reduction in input costs while increasing total yield.</p>
                <div class="p-8 bg-stone-100 rounded-2xl border border-stone-200">
                    <p class="text-stone-800 font-bold mb-2 italic">"Switching to AgroAI reduced my water consumption by 40% in the first season alone. The ROI was immediate."</p>
                    <p class="text-stone-500 text-xs font-bold uppercase tracking-widest">— Marcus Chen, Vineyard Owner</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
