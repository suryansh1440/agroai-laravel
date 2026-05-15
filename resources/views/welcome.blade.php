<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AgroAI | Future of Intelligent Agriculture</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Outfit', sans-serif; background-color: #f5f3e7; }
            .hero-text-shadow { text-shadow: 0 2px 10px rgba(0,0,0,0.1); }
            .btn-glow:hover { box-shadow: 0 0 20px rgba(22, 163, 74, 0.4); }
            .misty-gradient { background: linear-gradient(180deg, #f5f3e7 0%, rgba(245,243,231,0) 20%, rgba(13,44,30,0.8) 70%, #0d2c1e 100%); }
            .farmer-card { border-radius: 2rem; box-shadow: 30px 30px 60px rgba(0,0,0,0.1); }
            .testimonial-card { backdrop-filter: blur(8px); background: rgba(255,255,255,0.9); }
        </style>
    </head>
    <body class="antialiased text-stone-900 overflow-x-hidden">
        
        <x-guest-navbar />

        <!-- Hero Section -->
        <section class="relative min-h-[650px] flex flex-col pt-16 overflow-hidden">
            <div class="absolute inset-0 z-0">
                <img src="/foggy_field.png" alt="Mist" class="w-full h-full object-cover">
                <div class="absolute inset-0 misty-gradient"></div>
            </div>
            <div class="max-w-[1400px] mx-auto px-12 relative z-10 w-full mb-0">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-start">
                    <div class="pt-6">
                        <div class="inline-block px-4 py-1.5 bg-stone-200/50 border border-stone-300 rounded-full text-[10px] font-bold uppercase tracking-[0.2em] text-stone-600 mb-6">
                            Welcome to the Future of Farming
                        </div>
                        <h1 class="text-7xl xl:text-8xl font-bold text-stone-800 leading-[0.9] mb-8 hero-text-shadow">
                            Farming is Not <br> just Labor <br>
                            <span class="relative">
                                It's a Science
                                <svg class="absolute -bottom-4 left-0 w-full h-3 text-green-500/40" preserveAspectRatio="none" viewBox="0 0 100 10"><path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="10" fill="none"/></svg>
                            </span>
                        </h1>
                        <div class="flex items-start gap-8 mb-10">
                             <div class="relative w-24 h-24 flex-shrink-0">
                                <div class="w-24 h-24 bg-[#e8c045] rounded-full flex flex-col items-center justify-center p-2 text-center rotate-[-10deg] shadow-xl">
                                    <div class="text-lg font-bold text-stone-800 leading-none">4.9</div>
                                    <div class="flex text-[8px] text-stone-800 my-1">★★★★★</div>
                                    <div class="text-[7px] font-bold text-stone-800 uppercase leading-tight">Trustpilot</div>
                                </div>
                             </div>
                             <p class="text-lg text-stone-600 leading-relaxed max-w-md pt-2 italic">
                                "Tired of guessing your yield? Over not knowing what is going on with your soil? Want to get a better handle on your farm?"
                             </p>
                        </div>
                        <a href="{{ route('register') }}" class="inline-block px-10 py-5 bg-[#0d2c1e] text-white rounded-lg text-sm font-bold uppercase tracking-widest btn-glow transition-all hover:-translate-y-1 shadow-2xl">
                            Discover the power of AI
                        </a>
                    </div>
                    <div class="relative group">
                        <div class="relative farmer-card overflow-hidden bg-stone-300 aspect-[4/5] border-8 border-white">
                            <img src="/farmer_hero.png" alt="Modern Farmer" class="w-full h-full object-cover">
                        </div>
                        <div class="absolute -bottom-10 -left-10 testimonial-card p-6 rounded-2xl shadow-2xl max-w-[300px] border border-white/50 animate-bounce-slow">
                            <div class="flex items-center gap-4 mb-3">
                                <img src="https://ui-avatars.com/api/?name=S&background=random" alt="User" class="w-10 h-10 rounded-full">
                                <p class="text-[10px] font-bold text-stone-800">"AgroAI's Pest Guard changed my life."</p>
                            </div>
                            <p class="text-[9px] text-stone-500 italic">"My wheat yield increased by 30% this season thanks to the timely alerts."</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transition Section -->
            <div class="bg-[#0d2c1e] py-12 text-white">
                <div class="max-w-[1200px] mx-auto px-12">
                    <div class="text-center mb-12">
                        <h2 class="text-4xl italic font-serif leading-relaxed mb-6 max-w-4xl mx-auto">
                            <span class="text-green-500 font-bold">"But Phil,</span> why can't I just keep farming the traditional way?"
                        </h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-20 text-stone-400 leading-loose text-lg">
                        <p>Trying to fix a complex farm ecosystem alone is like fixing your broken arm with what you have in the garage. It is a whole lot easier with the help of an expert.</p>
                        <p>As a fully licensed digital agricultural advisor, <span class="text-green-400 font-bold">AgroAI understands.</span> We guide you along the path to sustainable success with research-backed techniques.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Expertise Grid -->
        <section id="expertise" class="bg-[#f5f3e7] py-32">
            <div class="max-w-[1400px] mx-auto px-12 relative">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center mb-20">
                    <div>
                        <div class="inline-block px-4 py-1.5 bg-stone-200/50 border border-stone-300 rounded-full text-[10px] font-bold uppercase tracking-[0.2em] text-stone-600 mb-6">Expertise</div>
                        <h2 class="text-6xl font-bold text-stone-800 leading-tight">Specializing in Yields & Protection</h2>
                    </div>
                    <p class="text-stone-500 text-lg leading-loose">At AgroAI, we move beyond basic farming advice. Our AI focuses on the deep science of your land—combining satellite data, soil sensors, and local weather patterns.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach(['Soil Analysis', 'Pest Alerts', 'Irrigation Scheduling', 'Weather Mapping', 'Crop Suitability', 'Market Insights', 'Disease Detection', 'Satellite Mapping', 'Seed Selection', 'Nitrogen Tracking', 'Harvest Prediction', 'Carbon Credits', 'Yield Forecast'] as $service)
                    <div class="flex items-center gap-4 group">
                        <div class="w-6 h-6 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-lg font-bold text-stone-700">{{ $service }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Advisory Split-Card -->
        <section class="bg-[#f5f3e7] pb-32">
            <div class="max-w-[1400px] mx-auto px-12">
                <div class="bg-white rounded-[3rem] overflow-hidden shadow-2xl flex flex-col lg:flex-row border border-white">
                    <img src="/soil_health.png" alt="Soil Health" class="lg:w-1/2 object-cover aspect-video lg:aspect-auto">
                    <div class="lg:w-1/2 p-16 lg:p-20 flex flex-col justify-center">
                        <h3 class="text-5xl font-bold text-stone-800 leading-tight mb-8">Optimize Your Soil for the Next Harvest</h3>
                        <p class="text-stone-500 text-lg leading-loose mb-12">Your soil is a living ecosystem. Learn the essential steps to prepare your fields for maximum productivity while maintaining long-term sustainability.</p>
                        <a href="#" class="px-10 py-5 bg-[#e8c045] text-stone-800 rounded-lg text-sm font-bold uppercase tracking-widest shadow-lg hover:bg-[#d4ac36] transition-all w-fit">Read the Full Guide</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Impact Stats -->
        <section class="bg-[#f5f3e7] py-32 border-t border-stone-200/50 text-center">
            <div class="max-w-[1400px] mx-auto px-12">
                <h2 class="text-6xl font-bold text-stone-800 mb-20">Celebrating Growth</h2>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-12">
                    @foreach([['Yield Increase', '80%'], ['Water Optimized', '35%'], ['Pest Reduction', '65%'], ['Satisfaction', '98%'], ['Growth', '45%']] as $stat)
                    <div class="group">
                        <div class="relative w-32 h-32 mx-auto mb-6 flex items-center justify-center">
                            <svg class="w-full h-full -rotate-90">
                                <circle cx="64" cy="64" r="58" stroke="currentColor" stroke-width="8" fill="transparent" class="text-stone-200" />
                                <circle cx="64" cy="64" r="58" stroke="currentColor" stroke-width="8" fill="transparent" class="text-green-600" stroke-dasharray="364" stroke-dashoffset="{{ 364 - (3.64 * intval($stat[1])) }}" stroke-linecap="round" />
                            </svg>
                            <span class="absolute text-2xl font-bold text-stone-800">{{ $stat[1] }}</span>
                        </div>
                        <p class="text-[10px] font-bold uppercase text-stone-500">{{ $stat[0] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- AI Powered Solutions -->
        <section id="solutions" class="bg-[#f5f3e7] py-32 border-t border-stone-200/50">
            <div class="max-w-[1400px] mx-auto px-12 grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-xl border border-white group hover:-translate-y-2 transition-all">
                    <img src="/pest_prevention.png" alt="Pest Guard" class="w-full h-[400px] object-cover">
                    <div class="p-12">
                        <h3 class="text-3xl font-bold text-stone-800 mb-4">Agro Chat (24/7 Support)</h3>
                        <p class="text-stone-500 text-lg leading-loose mb-8">Get instant answers to your irrigation and pest questions in your local language.</p>
                        <a href="{{ route('register') }}" class="inline-block px-8 py-4 bg-[#0d2c1e] text-white rounded-lg text-xs font-bold uppercase">Chat Now</a>
                    </div>
                </div>
                <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-xl border border-white group hover:-translate-y-2 transition-all">
                    <img src="/farmer_hero.png" alt="Precision Advisory" class="w-full h-[400px] object-cover">
                    <div class="p-12">
                        <h3 class="text-3xl font-bold text-stone-800 mb-4">Precision Advisory</h3>
                        <p class="text-stone-500 text-lg leading-loose mb-8">Personalized crop cycles tailored to your soil type and local micro-climate.</p>
                        <a href="{{ route('register') }}" class="inline-block px-8 py-4 bg-[#e8c045] text-stone-900 rounded-lg text-xs font-bold uppercase">Get Advised</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="bg-[#f5f3e7] py-32 border-t border-stone-200/50">
            <div class="max-w-[1400px] mx-auto px-12">
                <div class="flex items-center justify-between mb-20">
                    <h2 class="text-5xl font-bold text-stone-800">Why Farmers Trust Us</h2>
                    <div class="w-24 h-24 bg-[#e8c045] rounded-full flex flex-col items-center justify-center shadow-lg"><div class="text-lg font-bold text-stone-800">4.9</div><div class="text-[8px] text-stone-800">★★★★★</div></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @for($i=1; $i<=4; $i++)
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-stone-100 h-full">
                        <div class="flex justify-between mb-6"><div class="text-[8px] text-yellow-500">★★★★★</div><span class="text-[9px] font-bold text-stone-400">2 weeks ago</span></div>
                        <p class="text-sm text-stone-600 leading-loose mb-8 italic">"The pest alerts saved my cotton crop this year. Highly recommend AgroAI!"</p>
                        <div class="flex items-center justify-between pt-6 border-t border-stone-50"><span class="text-[11px] font-bold text-stone-800">Rahul K.</span><span class="text-stone-300 font-bold">G</span></div>
                    </div>
                    @endfor
                </div>
            </div>
        </section>


        <x-footer />
    </body>
</html>

    </body>
</html>
