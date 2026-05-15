<nav {{ $attributes->merge(['class' => 'w-full bg-[#f5f3e7] py-6 px-12 border-b border-stone-200/50 relative z-50']) }}>
    <div class="max-w-[1600px] mx-auto flex items-center justify-between">
        <!-- Left Menu -->
        <div class="flex items-center gap-10">
            <div class="hidden xl:flex items-center gap-10 text-[13px] font-bold uppercase tracking-[0.15em] text-stone-600">
                <a href="{{ route('about') }}" class="hover:text-green-600 transition-colors">About</a>
                <a href="{{ route('expertise') }}" class="hover:text-green-600 transition-colors">Why AgroAI?</a>
                <a href="{{ route('groups') }}" class="hover:text-green-600 transition-colors">Groups</a>
            </div>
        </div>

        <!-- Center Logo (Text Only) -->
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
            <a href="/" class="flex flex-col items-center group">
                <span class="text-3xl font-bold tracking-tighter text-stone-800">Agro<span class="text-green-600">AI</span></span>
            </a>
        </div>

        <!-- Right Menu -->
        <div class="flex items-center gap-10">
            <div class="hidden lg:flex items-center gap-10 text-[13px] font-bold uppercase tracking-[0.15em] text-stone-600">
                <a href="{{ route('training') }}" class="hover:text-green-600 transition-colors">Training</a>
                <a href="{{ route('media') }}" class="hover:text-green-600 transition-colors">Media</a>
                <a href="{{ route('contact') }}" class="hover:text-green-600 transition-colors">Contact</a>
            </div>
            
            <!-- Auth Link -->
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-6 py-3 border-2 border-green-600/30 text-green-700 rounded-lg text-[11px] font-black uppercase tracking-widest hover:bg-green-600 hover:text-white transition-all">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-3 border-2 border-green-600/30 text-green-700 rounded-lg text-[11px] font-black uppercase tracking-widest hover:bg-green-600 hover:text-white transition-all">Get Started</a>
                @endauth
            @endif
        </div>
    </div>
</nav>
