<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-stone-800 dark:text-stone-200 leading-tight">
                {{ __('AI Agro Chat') }}
            </h2>
            <form action="{{ route('chatbot.clear') }}" method="POST">
                @csrf
                <button type="submit" class="text-xs font-bold text-stone-500 hover:text-red-500 dark:hover:text-red-400 uppercase tracking-widest transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Clear Chat
                </button>
            </form>
        </div>
    </x-slot>

    <!-- Include Marked.js for Markdown parsing -->
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <style>
        body { overflow: hidden; }
    </style>

    <div class="py-6 bg-stone-50 dark:bg-stone-950 h-[calc(100vh-160px)] flex flex-col">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 w-full h-full flex flex-col">
            <div class="bg-white dark:bg-stone-900 rounded-3xl border border-stone-200 dark:border-stone-800 flex flex-col flex-1 shadow-xl overflow-hidden relative">
                
                <!-- Chat Header -->
                <div class="p-6 border-b border-stone-100 dark:border-stone-800 flex items-center justify-between bg-white dark:bg-stone-900 z-10 relative">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/50 rounded-2xl flex items-center justify-center relative">
                            <span class="absolute -top-1 -right-1 w-3 h-3 bg-green-500 border-2 border-white dark:border-stone-900 rounded-full"></span>
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg dark:text-white">AgroAI Expert</h3>
                            <p class="text-[11px] text-green-600 dark:text-green-400 font-bold uppercase tracking-widest">Active & Ready</p>
                        </div>
                    </div>
                </div>

                <!-- Chat Messages Area -->
                <div id="chat-box" class="flex-1 overflow-y-auto p-6 space-y-6 bg-stone-50/50 dark:bg-stone-950/30 scroll-smooth pb-32">
                    <!-- Default Greeting -->
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center text-white text-sm font-bold shadow-md shrink-0">AI</div>
                        <div class="bg-white dark:bg-stone-800 p-5 rounded-3xl rounded-tl-none border border-stone-100 dark:border-stone-700 shadow-sm max-w-[85%]">
                            <p class="text-sm dark:text-white leading-relaxed">Hello! I am your AI farming assistant. You can ask me anything about crops, pests, or weather in English, Hindi, or Punjabi. How can I help you today?</p>
                        </div>
                    </div>

                    <!-- Render Session History -->
                    @foreach($history ?? [] as $msg)
                        <div class="flex items-start gap-3 {{ $msg['role'] === 'user' ? 'justify-end' : '' }}">
                            @if($msg['role'] === 'assistant')
                                <div class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center text-white text-sm font-bold shadow-md shrink-0">AI</div>
                            @endif
                            
                            <div class="p-5 rounded-3xl {{ $msg['role'] === 'user' ? 'bg-purple-600 text-white rounded-tr-none shadow-md border border-purple-500 max-w-[75%]' : 'bg-white dark:bg-stone-800 dark:text-stone-200 rounded-tl-none shadow-sm border border-stone-100 dark:border-stone-700 max-w-[85%] prose prose-sm dark:prose-invert' }}">
                                @if($msg['role'] === 'assistant')
                                    {!! Str::markdown($msg['content']) !!}
                                @else
                                    <p class="text-sm m-0">{{ $msg['content'] }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Chat Input Fixed at Bottom -->
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-white via-white to-transparent dark:from-stone-900 dark:via-stone-900 pt-12">
                    
                    <!-- Quick Prompts -->
                    <div class="flex gap-2 mb-4 overflow-x-auto pb-2 scrollbar-hide px-1" id="quick-prompts">
                        <button onclick="sendQuickPrompt('What is the best NPK ratio for Wheat?')" class="whitespace-nowrap px-4 py-2 bg-white dark:bg-stone-800 border border-stone-200 dark:border-stone-700 rounded-full text-xs font-bold text-stone-600 dark:text-stone-300 hover:border-purple-500 hover:text-purple-600 dark:hover:text-purple-400 transition-colors shadow-sm">
                            🌾 Best NPK for Wheat?
                        </button>
                        <button onclick="sendQuickPrompt('How do I cure powdery mildew?')" class="whitespace-nowrap px-4 py-2 bg-white dark:bg-stone-800 border border-stone-200 dark:border-stone-700 rounded-full text-xs font-bold text-stone-600 dark:text-stone-300 hover:border-purple-500 hover:text-purple-600 dark:hover:text-purple-400 transition-colors shadow-sm">
                            🦠 Cure powdery mildew?
                        </button>
                        <button onclick="sendQuickPrompt('What crops grow well in sandy soil?')" class="whitespace-nowrap px-4 py-2 bg-white dark:bg-stone-800 border border-stone-200 dark:border-stone-700 rounded-full text-xs font-bold text-stone-600 dark:text-stone-300 hover:border-purple-500 hover:text-purple-600 dark:hover:text-purple-400 transition-colors shadow-sm">
                            🌱 Crops for sandy soil?
                        </button>
                    </div>

                    <form id="chat-form" class="flex gap-4 items-end bg-white dark:bg-stone-800 p-2 rounded-3xl border border-stone-200 dark:border-stone-700 shadow-xl focus-within:ring-2 focus-within:ring-purple-500/50 transition-all">
                        @csrf
                        <textarea id="user-input" rows="1" placeholder="Ask AgroAI anything..." class="flex-1 px-4 py-3 bg-transparent border-none focus:ring-0 resize-none text-sm dark:text-white max-h-32 min-h-[44px]" oninput="this.style.height = '';this.style.height = this.scrollHeight + 'px'"></textarea>
                        
                        <button type="submit" id="submit-btn" class="w-12 h-12 flex-shrink-0 bg-purple-600 hover:bg-purple-700 text-white rounded-2xl font-bold transition-all shadow-lg shadow-purple-500/25 flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="transform: translateX(-1px);"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Configure marked to sanitize and add some styling classes
        marked.setOptions({
            breaks: true,
            gfm: true
        });

        const chatForm = document.getElementById('chat-form');
        const chatBox = document.getElementById('chat-box');
        const userInput = document.getElementById('user-input');
        const submitBtn = document.getElementById('submit-btn');

        // Scroll to bottom on load
        chatBox.scrollTop = chatBox.scrollHeight;

        // Allow Shift+Enter for newline, Enter to submit
        userInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                chatForm.dispatchEvent(new Event('submit'));
            }
        });

        function sendQuickPrompt(text) {
            userInput.value = text;
            chatForm.dispatchEvent(new Event('submit'));
        }

        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const message = userInput.value.trim();
            if (!message) return;

            // Disable input while sending
            userInput.disabled = true;
            submitBtn.disabled = true;
            userInput.style.height = '44px'; // Reset height

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
                
                if (!response.ok) throw new Error('Network response was not ok');
                
                const data = await response.json();
                
                removeLoading(loadingId);
                appendMessage('ai', data.response);
            } catch (error) {
                console.error(error);
                removeLoading(loadingId);
                appendMessage('ai', 'Sorry, I encountered an error connecting to the server. Please try again.');
            } finally {
                userInput.disabled = false;
                submitBtn.disabled = false;
                userInput.focus();
            }
        });

        function appendMessage(sender, text) {
            const div = document.createElement('div');
            div.className = sender === 'user' ? 'flex items-start gap-3 justify-end' : 'flex items-start gap-3';
            
            const avatar = sender === 'user' ? '' : '<div class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center text-white text-sm font-bold shadow-md shrink-0">AI</div>';
            
            let contentHtml = '';
            if (sender === 'user') {
                // User messages are plain text
                contentHtml = `<div class="bg-purple-600 text-white p-5 rounded-3xl rounded-tr-none shadow-md border border-purple-500 max-w-[75%]">
                                <p class="text-sm m-0 whitespace-pre-wrap">${escapeHtml(text)}</p>
                              </div>`;
            } else {
                // AI messages are markdown parsed
                const parsedMarkdown = marked.parse(text);
                contentHtml = `<div class="bg-white dark:bg-stone-800 dark:text-stone-200 p-5 rounded-3xl rounded-tl-none shadow-sm border border-stone-100 dark:border-stone-700 max-w-[85%] prose prose-sm dark:prose-invert">
                                ${parsedMarkdown}
                              </div>`;
            }

            div.innerHTML = `${avatar}${contentHtml}`;
            
            // Add a slight animation class
            div.classList.add('animate-fade-in');
            
            chatBox.appendChild(div);
            scrollToBottom();
        }

        function appendLoading() {
            const id = 'loading-' + Date.now();
            const div = document.createElement('div');
            div.id = id;
            div.className = 'flex items-start gap-3';
            div.innerHTML = `
                <div class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center text-white text-sm font-bold shadow-md shrink-0">AI</div>
                <div class="bg-white dark:bg-stone-800 p-5 rounded-3xl rounded-tl-none border border-stone-100 dark:border-stone-700 shadow-sm max-w-[85%]">
                    <div class="flex gap-1.5 py-2">
                        <span class="w-2.5 h-2.5 bg-purple-400 rounded-full animate-bounce"></span>
                        <span class="w-2.5 h-2.5 bg-purple-400 rounded-full animate-bounce [animation-delay:0.2s]"></span>
                        <span class="w-2.5 h-2.5 bg-purple-400 rounded-full animate-bounce [animation-delay:0.4s]"></span>
                    </div>
                </div>
            `;
            chatBox.appendChild(div);
            scrollToBottom();
            return id;
        }

        function removeLoading(id) {
            const el = document.getElementById(id);
            if (el) el.remove();
        }

        function scrollToBottom() {
            chatBox.scrollTo({
                top: chatBox.scrollHeight,
                behavior: 'smooth'
            });
        }

        // Helper to escape HTML in user input to prevent XSS
        function escapeHtml(unsafe) {
            return unsafe
                 .replace(/&/g, "&amp;")
                 .replace(/</g, "&lt;")
                 .replace(/>/g, "&gt;")
                 .replace(/"/g, "&quot;")
                 .replace(/'/g, "&#039;");
        }
    </script>
    
    <style>
        /* Custom scrollbar for chat box */
        #chat-box::-webkit-scrollbar {
            width: 6px;
        }
        #chat-box::-webkit-scrollbar-track {
            background: transparent;
        }
        #chat-box::-webkit-scrollbar-thumb {
            background-color: rgba(168, 162, 158, 0.3);
            border-radius: 20px;
        }
        .dark #chat-box::-webkit-scrollbar-thumb {
            background-color: rgba(120, 113, 108, 0.3);
        }
        /* Hide scrollbar for quick prompts but allow scrolling */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</x-app-layout>
