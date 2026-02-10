<x-layouts.admin>
    <x-slot:title>Message: {{ $contactMessage->subject ?? 'No Subject' }}</x-slot:title>
    <x-slot:header>Message Details</x-slot:header>

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.contact-messages.index') }}" class="admin-btn-secondary gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back
            </a>
            <div>
                <h2 class="text-xl font-display font-semibold text-white">{{ $contactMessage->subject ?? 'No Subject' }}</h2>
                <p class="text-sm text-gray-400 mt-0.5">From {{ $contactMessage->name }} &middot; {{ $contactMessage->created_at->diffForHumans() }}</p>
            </div>
        </div>

        @php
            $statusConfig = [
                'new' => ['class' => 'bg-red-500/20 text-red-400', 'dot' => true],
                'read' => ['class' => 'bg-yellow-500/20 text-yellow-400', 'dot' => false],
                'responded' => ['class' => 'bg-green-500/20 text-green-400', 'dot' => false],
            ];
            $config = $statusConfig[$contactMessage->status] ?? ['class' => 'bg-gray-500/20 text-gray-400', 'dot' => false];
        @endphp
        <span class="inline-flex items-center gap-1.5 text-sm px-3 py-1 rounded-full {{ $config['class'] }}">
            @if($config['dot'])
                <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
            @endif
            {{ ucfirst($contactMessage->status) }}
        </span>
    </div>

    <!-- Two Column Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column (2/3) -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Sender Info -->
            <div class="admin-card">
                <h3 class="text-white font-semibold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Sender Information
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-surface-800/50 rounded-lg p-4">
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Name</p>
                        <p class="text-white font-medium">{{ $contactMessage->name }}</p>
                    </div>
                    <div class="bg-surface-800/50 rounded-lg p-4">
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Email</p>
                        <a href="mailto:{{ $contactMessage->email }}" class="text-primary-400 hover:text-primary-300 font-medium transition-colors">{{ $contactMessage->email }}</a>
                    </div>
                    <div class="bg-surface-800/50 rounded-lg p-4">
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Phone</p>
                        @if($contactMessage->phone)
                            <a href="tel:{{ $contactMessage->phone }}" class="text-primary-400 hover:text-primary-300 font-medium transition-colors">{{ $contactMessage->phone }}</a>
                        @else
                            <p class="text-gray-500">Not provided</p>
                        @endif
                    </div>
                    <div class="bg-surface-800/50 rounded-lg p-4">
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Inquiry Type</p>
                        @if($contactMessage->inquiry_type)
                            <span class="text-xs px-2.5 py-1 rounded-full bg-surface-600 text-gray-300 font-medium">{{ ucfirst($contactMessage->inquiry_type) }}</span>
                        @else
                            <p class="text-gray-500">Not specified</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Message Content -->
            <div class="admin-card">
                <h3 class="text-white font-semibold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Message
                </h3>
                <div class="bg-surface-800/50 rounded-lg p-5">
                    <p class="text-gray-300 leading-relaxed whitespace-pre-wrap">{{ $contactMessage->message }}</p>
                </div>
            </div>
        </div>

        <!-- Right Column (1/3) -->
        <div class="space-y-6">
            <!-- Admin Response -->
            <div class="admin-card">
                <h3 class="text-white font-semibold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
                    Admin Response
                </h3>

                @if($contactMessage->responded_at)
                    <div class="flex items-center gap-2 mb-3 text-xs text-green-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Responded {{ $contactMessage->responded_at->format('M d, Y \a\t h:i A') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.contact-messages.respond', $contactMessage) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="admin_response" class="block text-xs text-gray-400 mb-1.5">Response</label>
                        <textarea name="admin_response" id="admin_response" rows="6" class="admin-input text-sm" placeholder="Type your response...">{{ old('admin_response', $contactMessage->admin_response) }}</textarea>
                        @error('admin_response')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="admin-btn w-full gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        {{ $contactMessage->responded_at ? 'Update Response' : 'Send Response' }}
                    </button>
                </form>
            </div>

            <!-- Meta Information -->
            <div class="admin-card">
                <h3 class="text-white font-semibold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Details
                </h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between py-2 border-b border-surface-600">
                        <span class="text-sm text-gray-400">Received</span>
                        <span class="text-sm text-white">{{ $contactMessage->created_at->format('M d, Y h:i A') }}</span>
                    </div>
                    <div class="flex items-center justify-between py-2 border-b border-surface-600">
                        <span class="text-sm text-gray-400">Status</span>
                        <span class="inline-flex items-center gap-1.5 text-xs px-2 py-0.5 rounded-full {{ $config['class'] }}">
                            @if($config['dot'])
                                <span class="w-1.5 h-1.5 bg-red-500 rounded-full animate-pulse"></span>
                            @endif
                            {{ ucfirst($contactMessage->status) }}
                        </span>
                    </div>
                    @if($contactMessage->updated_at && $contactMessage->updated_at->ne($contactMessage->created_at))
                        <div class="flex items-center justify-between py-2 border-b border-surface-600">
                            <span class="text-sm text-gray-400">Last Updated</span>
                            <span class="text-sm text-white">{{ $contactMessage->updated_at->format('M d, Y h:i A') }}</span>
                        </div>
                    @endif
                    @if($contactMessage->responded_at)
                        <div class="flex items-center justify-between py-2 border-b border-surface-600">
                            <span class="text-sm text-gray-400">Responded At</span>
                            <span class="text-sm text-green-400">{{ $contactMessage->responded_at->format('M d, Y h:i A') }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Delete -->
            <div class="admin-card border-red-900/30">
                <h3 class="text-white font-semibold mb-2">Danger Zone</h3>
                <p class="text-gray-400 text-sm mb-4">Permanently delete this message. This action cannot be undone.</p>
                <form method="POST" action="{{ route('admin.contact-messages.destroy', $contactMessage) }}" onsubmit="return confirm('Are you sure you want to delete this message? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="admin-btn-danger w-full gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        Delete Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
