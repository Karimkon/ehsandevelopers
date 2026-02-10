<x-layouts.admin>
    <x-slot:title>Contact Messages</x-slot:title>
    <x-slot:header>Contact Messages</x-slot:header>

    <!-- Filter Bar -->
    <div class="admin-card mb-6">
        <form method="GET" action="{{ route('admin.contact-messages.index') }}">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                <!-- Search -->
                <div>
                    <label for="search" class="block text-xs text-gray-400 mb-1.5">Search</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Name, email, subject..." class="admin-input text-sm">
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-xs text-gray-400 mb-1.5">Status</label>
                    <select name="status" id="status" class="admin-select text-sm">
                        <option value="">All Statuses</option>
                        <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>New</option>
                        <option value="read" {{ request('status') === 'read' ? 'selected' : '' }}>Read</option>
                        <option value="responded" {{ request('status') === 'responded' ? 'selected' : '' }}>Responded</option>
                    </select>
                </div>

                <!-- Inquiry Type -->
                <div>
                    <label for="inquiry_type" class="block text-xs text-gray-400 mb-1.5">Inquiry Type</label>
                    <select name="inquiry_type" id="inquiry_type" class="admin-select text-sm">
                        <option value="">All Types</option>
                        @foreach(['general', 'project', 'support', 'partnership', 'career', 'other'] as $type)
                            <option value="{{ $type }}" {{ request('inquiry_type') === $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Date Range -->
                <div>
                    <label for="date_from" class="block text-xs text-gray-400 mb-1.5">Date From</label>
                    <input type="date" name="date_from" id="date_from" value="{{ request('date_from') }}" class="admin-input text-sm">
                </div>

                <div>
                    <label for="date_to" class="block text-xs text-gray-400 mb-1.5">Date To</label>
                    <input type="date" name="date_to" id="date_to" value="{{ request('date_to') }}" class="admin-input text-sm">
                </div>
            </div>

            <div class="flex items-center gap-3 mt-4">
                <button type="submit" class="admin-btn gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                    Filter
                </button>
                @if(request()->hasAny(['search', 'status', 'inquiry_type', 'date_from', 'date_to']))
                    <a href="{{ route('admin.contact-messages.index') }}" class="admin-btn-secondary gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        Clear
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Results Count -->
    <div class="flex items-center justify-between mb-4">
        <p class="text-sm text-gray-400">
            Showing <span class="text-white font-medium">{{ $messages->count() }}</span> of <span class="text-white font-medium">{{ $messages->total() }}</span> messages
        </p>
    </div>

    <!-- Messages Table -->
    <div class="admin-card overflow-hidden !p-0">
        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Inquiry Type</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                        <tr>
                            <td class="font-medium text-white whitespace-nowrap">{{ $message->name }}</td>
                            <td class="text-gray-400">{{ $message->email }}</td>
                            <td class="max-w-[250px] truncate" title="{{ $message->subject }}">{{ Str::limit($message->subject, 40) }}</td>
                            <td>
                                @if($message->inquiry_type)
                                    <span class="text-xs px-2 py-0.5 rounded-full bg-surface-600 text-gray-300">{{ ucfirst($message->inquiry_type) }}</span>
                                @else
                                    <span class="text-gray-500">--</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $statusConfig = [
                                        'new' => ['class' => 'bg-red-500/20 text-red-400', 'dot' => true],
                                        'read' => ['class' => 'bg-yellow-500/20 text-yellow-400', 'dot' => false],
                                        'responded' => ['class' => 'bg-green-500/20 text-green-400', 'dot' => false],
                                    ];
                                    $config = $statusConfig[$message->status] ?? ['class' => 'bg-gray-500/20 text-gray-400', 'dot' => false];
                                @endphp
                                <span class="inline-flex items-center gap-1.5 text-xs px-2 py-0.5 rounded-full {{ $config['class'] }}">
                                    @if($config['dot'])
                                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full animate-pulse"></span>
                                    @endif
                                    {{ ucfirst($message->status) }}
                                </span>
                            </td>
                            <td class="whitespace-nowrap text-gray-400 text-xs">{{ $message->created_at->format('M d, Y') }}<br>{{ $message->created_at->format('h:i A') }}</td>
                            <td>
                                <a href="{{ route('admin.contact-messages.show', $message) }}" class="admin-btn-secondary !px-3 !py-1.5 text-xs gap-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-12">
                                <div class="text-gray-500">
                                    <svg class="w-12 h-12 mx-auto mb-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    <p class="text-sm">No contact messages found.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($messages->hasPages())
        <div class="mt-6">
            {{ $messages->withQueryString()->links() }}
        </div>
    @endif
</x-layouts.admin>
