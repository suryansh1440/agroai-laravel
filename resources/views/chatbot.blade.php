<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-stone-800 dark:text-stone-200 leading-tight">
            {{ __('AI Agro Chat') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-stone-50 dark:bg-stone-950 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 h-[70vh]">
            <div class="bg-white dark:bg-stone-900 rounded-3xl border border-stone-200 dark:border-stone-800 flex flex-col h-full shadow-sm overflow-hidden">
                
                <!-- Chat Header -->
                <div class="p-6 border-b border-stone-100 dark:border-stone-800 flex items-center gap-4">
                    <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/50 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold dark:text-white">Multilingual Assistant</h3>
                        <p class="text-[10px] text-green-500 font-bold uppercase tracking-widest">Active Now</p>
                    </div>
                </div>

                <!-- Chat Messages -->
                <div id="chat-box" class="flex-1 overflow-y-auto p-6 space-y-4 bg-stone-50/50 dark:bg-stone-950/50">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center text-white text-xs font-bold">AI</div>
                        <div class="bg-white dark:bg-stone-800 p-4 rounded-2xl rounded-tl-none border border-stone-100 dark:border-stone-700 shadow-sm max-w-[80%]">
                            <p class="text-sm dark:text-white">Hello! I am your AI farming assistant. You can ask me anything about crops, pests, or weather in English, Hindi, or Punjabi. How can I help you today?</p>
                        </div>
                    </div>
                </div>

                <!-- Chat Input -->
                <div class="p-6 border-t border-stone-100 dark:border-stone-800 bg-white dark:bg-stone-900">
                    <form id="chat-form" class="flex gap-4">
                        @csrf
                        <input type="text" id="user-input" placeholder="Type your message here..." class="flex-1 px-6 py-4 bg-stone-50 dark:bg-stone-800 border border-stone-200 dark:border-stone-700 rounded-2xl text-sm focus:ring-2 focus:ring-purple-500 transition-all dark:text-white outline-none">
                        <button type="submit" class="px-6 py-4 bg-purple-600 hover:bg-purple-700 text-white rounded-2xl font-bold transition-all shadow-lg shadow-purple-500/25">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        const chatForm = document.getElementById('chat-form');
        const chatBox = document.getElementById('chat-box');
        const userInput = document.getElementById('user-input');

        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const message = userInput.value.trim();
            if (!message) return;

            // Append user message
            appendMessage('user', message);
            userInput.value = '';

            // Loading state
            const loadingId = appendLoading();

            try {
                const response = await fetch('{{ route("chatbot") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ message })
                });
                const data = await response.json();
                
                removeLoading(loadingId);
                appendMessage('ai', data.response);
            } catch (error) {
                removeLoading(loadingId);
                appendMessage('ai', 'Sorry, I encountered an error. Please try again.');
            }
        });

        function appendMessage(sender, text) {
            const div = document.createElement('div');
            div.className = sender === 'user' ? 'flex items-start gap-3 justify-end' : 'flex items-start gap-3';
            
            const avatar = sender === 'user' ? '' : '<div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center text-white text-xs font-bold">AI</div>';
            const bgColor = sender === 'user' ? 'bg-purple-600 text-white border-purple-500' : 'bg-white dark:bg-stone-800 dark:text-white border-stone-100 dark:border-stone-700';
            const roundedClass = sender === 'user' ? 'rounded-2xl rounded-tr-none' : 'rounded-2xl rounded-tl-none';

            div.innerHTML = `
                ${avatar}
                <div class="${bgColor} p-4 ${roundedClass} border shadow-sm max-w-[80%]">
                    <p class="text-sm">${text}</p>
                </div>
            `;
            chatBox.appendChild(div);
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        function appendLoading() {
            const id = 'loading-' + Date.now();
            const div = document.createElement('div');
            div.id = id;
            div.className = 'flex items-start gap-3';
            div.innerHTML = `
                <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center text-white text-xs font-bold">AI</div>
                <div class="bg-white dark:bg-stone-800 p-4 rounded-2xl rounded-tl-none border border-stone-100 dark:border-stone-700 shadow-sm">
                    <div class="flex gap-1">
                        <span class="w-2 h-2 bg-stone-300 rounded-full animate-bounce"></span>
                        <span class="w-2 h-2 bg-stone-300 rounded-full animate-bounce [animation-delay:0.2s]"></span>
                        <span class="w-2 h-2 bg-stone-300 rounded-full animate-bounce [animation-delay:0.4s]"></span>
                    </div>
                </div>
            `;
            chatBox.appendChild(div);
            chatBox.scrollTop = chatBox.scrollHeight;
            return id;
        }

        function removeLoading(id) {
            const el = document.getElementById(id);
            if (el) el.remove();
        }
    </script>
</x-app-layout>
