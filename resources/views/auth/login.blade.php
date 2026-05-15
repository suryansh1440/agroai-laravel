<x-guest-layout>
    <div class="relative h-full flex flex-col justify-center" x-data="{ step: 1 }">
        <!-- Step 1: Login -->
        <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
            <div class="mb-6">
                <h2 class="text-[36px] font-bold text-stone-900 leading-tight mb-2 tracking-tight">Login</h2>
                <p class="text-stone-400 text-sm font-medium">Please enter your details to continue.</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-stone-700 mb-1.5">Email</label>
                    <div class="relative group">
                        <x-text-input id="email" class="block w-full bg-white border-stone-200 focus:border-green-500 focus:ring-green-500/20 rounded-xl px-4 py-3 transition-all pr-12" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@email.com" />
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-stone-300 group-focus-within:text-green-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-xs font-semibold text-stone-700 mb-1.5">Password</label>
                    <div class="relative group">
                        <x-text-input id="password" class="block w-full bg-white border-stone-200 focus:border-green-500 focus:ring-green-500/20 rounded-xl px-4 py-3 transition-all pr-12"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" placeholder="••••••••" />
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-stone-300 group-focus-within:text-green-500 transition-colors cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="text-xs font-bold text-orange-400 hover:text-orange-500 transition-colors" href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>
                    @endif
                </div>

                <div>
                    <button type="submit" class="w-full py-3.5 bg-[#4cc9f0] hover:bg-[#43b5d8] text-white rounded-xl text-base font-bold transition-all shadow-lg shadow-cyan-500/20">
                        {{ __('Log In') }}
                    </button>
                </div>

                <div class="text-center pt-2">
                    <button type="button" @click="step = 2" class="text-xs font-bold text-stone-400 hover:text-stone-700 uppercase tracking-widest transition-colors flex items-center justify-center gap-2 mx-auto">
                        Other Sign In Options
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </form>
        </div>

        <!-- Step 2: Social Links (To keep vertical space clean) -->
        <div x-show="step === 2" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
            <div class="mb-8">
                <button @click="step = 1" class="mb-6 flex items-center gap-2 text-xs font-bold text-stone-400 hover:text-stone-700 transition-colors uppercase tracking-widest">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to login
                </button>
                <h2 class="text-3xl font-bold text-stone-900 leading-tight mb-2 tracking-tight">Social Connect</h2>
                <p class="text-stone-400 text-sm font-medium">Use your existing accounts to sign in.</p>
            </div>

            <div class="space-y-4">
                <button type="button" class="w-full flex items-center justify-center gap-4 py-4 border border-stone-200 rounded-2xl text-sm font-bold text-stone-700 hover:bg-stone-50 transition-all">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6" alt="Google">
                    Continue with Google
                </button>
                <button type="button" class="w-full flex items-center justify-center gap-4 py-4 border border-stone-200 rounded-2xl text-sm font-bold text-stone-700 hover:bg-stone-50 transition-all">
                    <img src="https://www.svgrepo.com/show/303106/apple-black-logo.svg" class="w-6 h-6" alt="Apple">
                    Continue with Apple
                </button>
                <button type="button" class="w-full flex items-center justify-center gap-4 py-4 border border-stone-200 rounded-2xl text-sm font-bold text-stone-700 hover:bg-stone-50 transition-all">
                    <img src="https://www.svgrepo.com/show/303114/facebook-3.svg" class="w-6 h-6" alt="Facebook">
                    Continue with Facebook
                </button>
            </div>
        </div>

        <div class="text-center pt-8 mt-8 border-t border-stone-100">
            <p class="text-xs text-stone-400 font-medium">
                New here? 
                <a href="{{ route('register') }}" class="font-bold text-stone-700 hover:text-stone-900 ml-1">Create Account</a>
            </p>
        </div>
    </div>
</x-guest-layout>
