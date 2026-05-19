@extends('layouts.pages')

@section('title', 'Contact Us')

@section('content')
<div class="max-w-[1200px] mx-auto px-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-24">
        <div>
            <div class="inline-block px-4 py-1.5 bg-green-100 text-green-700 rounded-full text-[10px] font-bold uppercase tracking-widest mb-6">Get in Touch</div>
            <h1 class="text-6xl font-bold text-stone-800 leading-tight mb-8 tracking-tight">Let's grow <br> <span class="text-green-600">together.</span></h1>
            <p class="text-lg text-stone-600 leading-relaxed mb-12">Have questions about our technology or want to schedule a demo? Our team of agronomists and AI experts is here to help.</p>
            
            <div class="space-y-10">
                <div class="flex gap-6">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-md flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-stone-400 uppercase tracking-widest mb-1">Email Us</h4>
                        <p class="text-lg font-bold text-stone-800">hello@agroai.tech</p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="w-12 h-12 bg-white rounded-xl shadow-md flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-stone-400 uppercase tracking-widest mb-1">Visit Us</h4>
                        <p class="text-lg font-bold text-stone-800">123 Innovation Way, <br>Silicon Valley, CA 94025</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-12 rounded-[40px] shadow-2xl border border-stone-100">
            @if(session('success'))
                <div class="mb-8 p-6 bg-green-50 border border-green-200 rounded-2xl text-green-700 font-bold flex items-center gap-4 animate-bounce-slow">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-8">
                @csrf
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-stone-400 mb-3">First Name</label>
                        <input type="text" name="first_name" required class="w-full bg-stone-50 border-stone-200 rounded-xl px-4 py-4 focus:ring-green-500 focus:border-green-500 transition-all" placeholder="John">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-stone-400 mb-3">Last Name</label>
                        <input type="text" name="last_name" required class="w-full bg-stone-50 border-stone-200 rounded-xl px-4 py-4 focus:ring-green-500 focus:border-green-500 transition-all" placeholder="Doe">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-stone-400 mb-3">Email Address</label>
                    <input type="email" name="email" required class="w-full bg-stone-50 border-stone-200 rounded-xl px-4 py-4 focus:ring-green-500 focus:border-green-500 transition-all" placeholder="name@email.com">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-stone-400 mb-3">Message</label>
                    <textarea name="message" required rows="4" class="w-full bg-stone-50 border-stone-200 rounded-xl px-4 py-4 focus:ring-green-500 focus:border-green-500 transition-all" placeholder="Tell us about your farm..."></textarea>
                </div>
                <button type="submit" class="w-full py-5 bg-green-600 hover:bg-green-700 text-white rounded-xl text-sm font-bold uppercase tracking-widest transition-all shadow-xl shadow-green-600/20">Send Message</button>
            </form>
        </div>
    </div>
</div>
@endsection
