<x-guest-layout>
    <div class="relative h-full flex flex-col justify-center" x-data="{ step: 1 }">
        <!-- Step 1: Basic Info -->
        <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
            <div class="mb-8">
                <h2 class="text-[36px] font-bold text-stone-900 leading-tight mb-2 tracking-tight">Register</h2>
                <p class="text-stone-400 text-sm font-medium">Step 1 of 2: Basic Account Details</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-xs font-semibold text-stone-700 mb-1.5">Full Name</label>
                    <div class="relative group">
                        <x-text-input id="name" class="block w-full bg-white border-stone-200 focus:border-green-500 focus:ring-green-500/20 rounded-xl px-4 py-3 transition-all pr-12" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-stone-300 group-focus-within:text-green-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-stone-700 mb-1.5">Email</label>
                    <div class="relative group">
                        <x-text-input id="email" class="block w-full bg-white border-stone-200 focus:border-green-500 focus:ring-green-500/20 rounded-xl px-4 py-3 transition-all pr-12" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@email.com" />
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-stone-300 group-focus-within:text-green-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <div class="pt-2">
                    <button type="button" @click="step = 2" class="w-full py-4 bg-[#0d2c1e] text-white rounded-xl text-base font-bold transition-all flex items-center justify-center gap-2">
                        Next Step
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
        </div>

        <!-- Step 2: Security -->
        <div x-show="step === 2" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
            <div class="mb-8">
                <button @click="step = 1" class="mb-6 flex items-center gap-2 text-xs font-bold text-stone-400 hover:text-stone-700 transition-colors uppercase tracking-widest">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to info
                </button>
                <h2 class="text-[36px] font-bold text-stone-900 leading-tight mb-2 tracking-tight">Security</h2>
                <p class="text-stone-400 text-sm font-medium">Step 2 of 2: Protect your account</p>
            </div>

            <div class="space-y-6">
                <!-- Password -->
                <div>
                    <label for="password" class="block text-xs font-semibold text-stone-700 mb-1.5">Password</label>
                    <div class="relative group">
                        <x-text-input id="password" class="block w-full bg-white border-stone-200 focus:border-green-500 focus:ring-green-500/20 rounded-xl px-4 py-3 transition-all pr-12"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" placeholder="••••••••" />
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-stone-300 group-focus-within:text-green-500 transition-colors cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-xs font-semibold text-stone-700 mb-1.5">Confirm Password</label>
                    <div class="relative group">
                        <x-text-input id="password_confirmation" class="block w-full bg-white border-stone-200 focus:border-green-500 focus:ring-green-500/20 rounded-xl px-4 py-3 transition-all pr-12"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-stone-300 group-focus-within:text-green-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-4 bg-[#4cc9f0] hover:bg-[#43b5d8] text-white rounded-xl text-lg font-bold transition-all shadow-lg shadow-cyan-500/20">
                        {{ __('Complete Registration') }}
                    </button>
                </div>
            </div>
        </div>

        <div class="text-center pt-8 mt-8 border-t border-stone-100">
            <p class="text-xs text-stone-400 font-medium">
                Already have an account? 
                <a href="{{ route('login') }}" class="font-bold text-stone-700 hover:text-stone-900 ml-1">Log in</a>
            </p>
        </div>
        </form>
    </div>
</x-guest-layout>
