<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-stone-800 dark:text-stone-200 leading-tight">
            {{ __('Account Settings') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-stone-50 dark:bg-stone-950 min-h-screen" x-data="{ activeTab: 'info' }">
        <div class="max-w-[1400px] mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-10">
                
                <!-- Sidebar Navigation (Right side in request, but typically left for UX - I will place it on left with premium styling) -->
                <div class="w-full lg:w-80 flex-shrink-0">
                    <div class="bg-white dark:bg-stone-900 rounded-[32px] border border-stone-200 dark:border-stone-800 p-6 shadow-sm sticky top-24">
                        <div class="mb-8 px-4">
                            <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-stone-400">Settings Menu</h3>
                        </div>
                        
                        <nav class="space-y-2">
                            <button 
                                @click="activeTab = 'info'"
                                :class="activeTab === 'info' ? 'bg-green-600 text-white shadow-lg shadow-green-600/20' : 'text-stone-500 hover:bg-stone-100 dark:hover:bg-stone-800'"
                                class="w-full flex items-center gap-4 px-6 py-4 rounded-2xl text-sm font-bold transition-all duration-300 group"
                            >
                                <svg class="w-5 h-5" :class="activeTab === 'info' ? 'text-white' : 'text-stone-400 group-hover:text-green-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                Profile Info
                            </button>

                            <button 
                                @click="activeTab = 'password'"
                                :class="activeTab === 'password' ? 'bg-green-600 text-white shadow-lg shadow-green-600/20' : 'text-stone-500 hover:bg-stone-100 dark:hover:bg-stone-800'"
                                class="w-full flex items-center gap-4 px-6 py-4 rounded-2xl text-sm font-bold transition-all duration-300 group"
                            >
                                <svg class="w-5 h-5" :class="activeTab === 'password' ? 'text-white' : 'text-stone-400 group-hover:text-green-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                Change Password
                            </button>

                            <div class="pt-6 mt-6 border-t border-stone-100 dark:border-stone-800">
                                <button 
                                    @click="activeTab = 'delete'"
                                    :class="activeTab === 'delete' ? 'bg-red-600 text-white shadow-lg shadow-red-600/20' : 'text-red-400 hover:bg-red-50 dark:hover:bg-red-900/10'"
                                    class="w-full flex items-center gap-4 px-6 py-4 rounded-2xl text-sm font-bold transition-all duration-300 group"
                                >
                                    <svg class="w-5 h-5" :class="activeTab === 'delete' ? 'text-white' : 'text-red-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    Delete Account
                                </button>
                            </div>
                        </nav>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="flex-1">
                    <div class="bg-white dark:bg-stone-900 rounded-[32px] border border-stone-200 dark:border-stone-800 shadow-sm overflow-hidden">
                        
                        <!-- Profile Info Tab -->
                        <div x-show="activeTab === 'info'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" class="p-10 lg:p-16">
                            <div class="mb-12">
                                <h3 class="text-2xl font-bold text-stone-800 dark:text-white mb-2">Profile Information</h3>
                                <p class="text-stone-500 dark:text-stone-400">Update your account's profile information and email address.</p>
                            </div>
                            <div class="max-w-2xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <!-- Password Tab -->
                        <div x-show="activeTab === 'password'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" style="display: none;" class="p-10 lg:p-16">
                            <div class="mb-12">
                                <h3 class="text-2xl font-bold text-stone-800 dark:text-white mb-2">Update Password</h3>
                                <p class="text-stone-500 dark:text-stone-400">Ensure your account is using a long, random password to stay secure.</p>
                            </div>
                            <div class="max-w-2xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        <!-- Delete Account Tab -->
                        <div x-show="activeTab === 'delete'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" style="display: none;" class="p-10 lg:p-16">
                            <div class="mb-12">
                                <h3 class="text-2xl font-bold text-red-600 mb-2">Danger Zone</h3>
                                <p class="text-stone-500 dark:text-stone-400">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
                            </div>
                            <div class="max-w-2xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
