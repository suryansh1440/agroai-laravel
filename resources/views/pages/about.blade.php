@extends('layouts.pages')

@section('title', 'About Us')

@section('content')
<div class="max-w-[1200px] mx-auto px-6 pt-12">
    <!-- Simple Hero -->
    <div class="mb-16 text-left">
        <h1 class="text-5xl font-bold text-stone-900 mb-6 tracking-tight">About AgroAI</h1>
        <p class="text-xl text-stone-600 max-w-3xl leading-relaxed">We are a dedicated team of agronomists and technologists working to modernize agriculture through accessible AI solutions.</p>
    </div>

    <!-- Standard Image/Text Split -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:gap-16 items-center mb-24">
        <div class="rounded-2xl overflow-hidden shadow-lg aspect-video">
            <img src="/soil_health.png" alt="Agriculture" class="w-full h-full object-cover">
        </div>
        <div class="ml-12">
            <h2 class="text-3xl font-bold text-stone-800 mb-6">Our Mission</h2>
            <div class="space-y-6 text-stone-600 leading-relaxed">
                <p>AgroAI was established to bridge the information gap in modern farming. By using localized data and advanced algorithms, we help farmers make informed decisions that increase efficiency and reduce environmental impact.</p>
                <p>We focus on three core areas: soil health monitoring, precision pest management, and water conservation strategies.</p>
            </div>
        </div>
    </div>

    <!-- Clean Values Section -->
    <div class="mb-24">
        <h2 class="text-3xl font-bold text-stone-800 mb-12 text-center">Our Core Values</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl border border-stone-200">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-stone-800 mb-3">Innovation</h3>
                <p class="text-stone-600 text-sm leading-relaxed">Bringing practical technology solutions to everyday farming challenges.</p>
            </div>
            <div class="bg-white p-8 rounded-xl border border-stone-200">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.21 3m-11.13 4.14l.054.09a13.917 13.917 0 0012.612 0l.054-.09m-12.72 0A13.905 13.905 0 005 12.214m0 0V12a7 7 0 1114 0v.214m-14 0a13.905 13.905 0 001.213 2.126"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-stone-800 mb-3">Integrity</h3>
                <p class="text-stone-600 text-sm leading-relaxed">Commitment to data privacy and transparent agricultural advice.</p>
            </div>
            <div class="bg-white p-8 rounded-xl border border-stone-200">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-stone-800 mb-3">Impact</h3>
                <p class="text-stone-600 text-sm leading-relaxed">Focusing on measurable improvements in yield and sustainability.</p>
            </div>
        </div>
    </div>
</div>
@endsection
