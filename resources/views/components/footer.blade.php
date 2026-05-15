<footer {{ $attributes->merge(['class' => 'bg-stone-900 text-white py-16']) }}>
    <div class="max-w-[1400px] mx-auto px-12 grid grid-cols-1 md:grid-cols-4 gap-12">
        <div class="col-span-1 md:col-span-2">
            <a href="/" class="text-2xl font-bold tracking-tighter mb-6 block">Agro<span class="text-green-500">AI</span></a>
            <p class="text-stone-400 max-w-sm mb-8">Empowering the next generation of farmers with artificial intelligence and sustainable science.</p>
            <div class="flex gap-6">
                <a href="#" class="text-stone-500 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                </a>
                <a href="#" class="text-stone-500 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/></svg>
                </a>
                <a href="#" class="text-stone-500 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.166.054 1.791.247 2.212.417.559.215.955.47 1.374.888.418.419.674.814.89 1.374.169.421.363 1.046.417 2.212.058 1.266.069 1.645.069 4.849s-.011 3.584-.069 4.849c-.054 1.166-.248 1.791-.417 2.212-.216.559-.47.955-.888 1.374-.419.418-.814.674-1.374.89-.421.169-1.046.363-2.212.417-1.266.058-1.645.069-4.849.069s-3.584-.011-4.849-.069c-1.166-.054-1.791-.248-2.212-.417-.559-.216-.955-.47-1.374-.888-.418-.419-.674-.814-.89-1.374-.169-.421-.363-1.046-.417-2.212-.058-1.266-.069-1.645-.069-4.849s.011-3.584.069-4.849c.054-1.166.247-1.791.417-2.212.215-.559.47-.955.888-1.374.419-.418.814-.674 1.374-.89.421-.169 1.046-.363 2.212-.417 1.266-.058 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-1.303.059-2.192.266-2.97.568-.804.312-1.484.73-2.16 1.406-.676.676-1.094 1.356-1.406 2.16-.302.778-.509 1.667-.568 2.97-.058 1.28-.072 1.688-.072 4.947s.014 3.667.072 4.947c.059 1.303.266 2.192.568 2.97.312.804.73 1.484 1.406 2.16.676.676 1.356 1.094 2.16 1.406.778.302 1.667.509 2.97.568 1.28.058 1.688.072 4.947.072s3.667-.014 4.947-.072c1.303-.059 2.192-.266 2.97-.568.804-.312 1.484-.73 2.16-1.406.676-.676 1.094-1.356 1.406-2.16.302-.778.509-1.667.568-2.97.058-1.28.072-1.688.072-4.947s-.014-3.667-.072-4.947c-.059-1.303-.266-2.192-.568-2.97-.312-.804-.73-1.484-2.16-1.406-.676-.676-1.356-1.094-2.16-1.406-.778-.302-1.667-.509-2.97-.568-1.28-.058-1.688-.072-4.947-.072z"/></svg>
                </a>
            </div>
        </div>
        <div>
            <h4 class="text-sm font-bold uppercase tracking-widest mb-6">Explore</h4>
            <ul class="space-y-4 text-stone-400 text-sm">
                <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About Us</a></li>
                <li><a href="{{ route('expertise') }}" class="hover:text-white transition-colors">Our Expertise</a></li>
                <li><a href="{{ route('groups') }}" class="hover:text-white transition-colors">Farmer Groups</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-sm font-bold uppercase tracking-widest mb-6">Support</h4>
            <ul class="space-y-4 text-stone-400 text-sm">
                <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact</a></li>
                <li><a href="{{ route('training') }}" class="hover:text-white transition-colors">Training</a></li>
                <li><a href="{{ route('media') }}" class="hover:text-white transition-colors">Media Kit</a></li>
            </ul>
        </div>
    </div>
    <div class="max-w-[1400px] mx-auto px-12 pt-16 mt-16 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
        <p class="text-stone-500 text-xs">&copy; {{ date('Y') }} AgroAI. All rights reserved.</p>
        <div class="flex gap-8 text-stone-500 text-xs uppercase tracking-widest font-bold">
            <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
            <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
        </div>
    </div>
</footer>
