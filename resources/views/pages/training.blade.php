@extends('layouts.pages')

@section('title', 'Training & Resources')

@section('content')
<div class="max-w-[1200px] mx-auto px-12">
    <div class="mb-20">
        <h1 class="text-6xl font-bold text-stone-800 tracking-tight leading-tight mb-8">Master the Art of <br> <span class="text-green-600">AI-Driven Farming</span></h1>
        <div class="flex gap-4">
            <button class="px-6 py-3 bg-stone-900 text-white rounded-full text-xs font-bold uppercase tracking-widest">All Courses</button>
            <button class="px-6 py-3 bg-white border border-stone-200 text-stone-600 rounded-full text-xs font-bold uppercase tracking-widest hover:border-green-500 transition-all">Beginner</button>
            <button class="px-6 py-3 bg-white border border-stone-200 text-stone-600 rounded-full text-xs font-bold uppercase tracking-widest hover:border-green-500 transition-all">Advanced</button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @php
            $courses = [
                ['title' => 'Soil Data 101', 'level' => 'Beginner', 'duration' => '2 Hours', 'image' => '/soil_health.png'],
                ['title' => 'Pest Prediction Pro', 'level' => 'Advanced', 'duration' => '5 Hours', 'image' => '/pest_prevention.png'],
                ['title' => 'Drones in the Field', 'level' => 'Intermediate', 'duration' => '3 Hours', 'image' => '/farmer_hero.png'],
            ];
        @endphp

        @foreach($courses as $course)
        <div class="premium-card rounded-3xl overflow-hidden group">
            <div class="aspect-video relative overflow-hidden">
                <img src="{{ $course['image'] }}" alt="Course" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur rounded-lg text-[10px] font-bold uppercase tracking-widest text-stone-800">{{ $course['level'] }}</div>
            </div>
            <div class="p-8">
                <div class="flex items-center gap-2 text-stone-400 text-xs font-bold uppercase tracking-widest mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ $course['duration'] }}
                </div>
                <h3 class="text-xl font-bold text-stone-800 mb-6 group-hover:text-green-600 transition-colors">{{ $course['title'] }}</h3>
                <button class="w-full py-4 border-2 border-stone-100 rounded-xl text-sm font-bold text-stone-600 hover:border-green-600 hover:text-green-600 transition-all">Enroll Now</button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
