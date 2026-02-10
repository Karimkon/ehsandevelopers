<x-layouts.admin>
    <x-slot:title>Dashboard</x-slot:title>
    <x-slot:header>Dashboard</x-slot:header>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Total Requests -->
        <div class="admin-card group hover:border-primary-600/50 transition-colors">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm font-medium">Total Requests</p>
                    <p class="text-3xl font-bold text-white mt-1">{{ number_format($stats['total_requests']) }}</p>
                </div>
                <div class="w-12 h-12 bg-primary-600/20 rounded-xl flex items-center justify-center group-hover:bg-primary-600/30 transition-colors">
                    <svg class="w-6 h-6 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="text-xs px-2 py-0.5 rounded-full bg-yellow-500/20 text-yellow-400">{{ $stats['new_requests'] }} new</span>
            </div>
        </div>

        <!-- Total Messages -->
        <div class="admin-card group hover:border-blue-600/50 transition-colors">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm font-medium">Contact Messages</p>
                    <p class="text-3xl font-bold text-white mt-1">{{ number_format($stats['total_messages']) }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-600/20 rounded-xl flex items-center justify-center group-hover:bg-blue-600/30 transition-colors">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="text-xs px-2 py-0.5 rounded-full bg-red-500/20 text-red-400">{{ $stats['unread_messages'] }} unread</span>
            </div>
        </div>

        <!-- Services & Categories -->
        <div class="admin-card group hover:border-secondary-600/50 transition-colors">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm font-medium">Services</p>
                    <p class="text-3xl font-bold text-white mt-1">{{ number_format($stats['total_services']) }}</p>
                </div>
                <div class="w-12 h-12 bg-secondary-600/20 rounded-xl flex items-center justify-center group-hover:bg-secondary-600/30 transition-colors">
                    <svg class="w-6 h-6 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <span class="text-xs px-2 py-0.5 rounded-full bg-surface-500/50 text-gray-300">{{ $stats['total_categories'] }} categories</span>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="flex flex-wrap gap-3 mb-8">
        <a href="{{ route('admin.service-requests.index', ['status' => 'new']) }}" class="admin-btn gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            View New Requests
        </a>
        <a href="{{ route('admin.categories.create') }}" class="admin-btn-secondary gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add Category
        </a>
        <a href="{{ route('admin.services.create') }}" class="admin-btn-secondary gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add Service
        </a>
    </div>

    <!-- Two Column Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Service Requests -->
        <div class="admin-card">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-white font-semibold">Recent Service Requests</h2>
                <a href="{{ route('admin.service-requests.index') }}" class="text-primary-400 hover:text-primary-300 text-sm transition-colors">View All</a>
            </div>

            @if($recentRequests->isEmpty())
                <p class="text-gray-500 text-sm py-4 text-center">No service requests yet.</p>
            @else
                <div class="space-y-3">
                    @foreach($recentRequests as $request)
                    <a href="{{ route('admin.service-requests.show', $request) }}" class="flex items-center justify-between p-3 rounded-lg bg-surface-800/50 hover:bg-surface-600/50 transition-colors group">
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center gap-2">
                                <p class="text-white text-sm font-medium truncate">{{ $request->name }}</p>
                                @php
                                    $statusColors = [
                                        'new' => 'bg-blue-500/20 text-blue-400',
                                        'reviewing' => 'bg-yellow-500/20 text-yellow-400',
                                        'quoted' => 'bg-purple-500/20 text-purple-400',
                                        'in_progress' => 'bg-primary-500/20 text-primary-400',
                                        'completed' => 'bg-green-500/20 text-green-400',
                                        'cancelled' => 'bg-red-500/20 text-red-400',
                                    ];
                                @endphp
                                <span class="text-xs px-2 py-0.5 rounded-full {{ $statusColors[$request->status] ?? 'bg-gray-500/20 text-gray-400' }}">{{ ucfirst(str_replace('_', ' ', $request->status)) }}</span>
                            </div>
                            <p class="text-gray-500 text-xs mt-0.5">{{ $request->reference_number }} &middot; {{ $request->created_at->diffForHumans() }}</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-600 group-hover:text-gray-400 transition-colors flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Recent Contact Messages -->
        <div class="admin-card">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-white font-semibold">Recent Messages</h2>
                <a href="{{ route('admin.contact-messages.index') }}" class="text-primary-400 hover:text-primary-300 text-sm transition-colors">View All</a>
            </div>

            @if($recentMessages->isEmpty())
                <p class="text-gray-500 text-sm py-4 text-center">No messages yet.</p>
            @else
                <div class="space-y-3">
                    @foreach($recentMessages as $message)
                    <a href="{{ route('admin.contact-messages.show', $message) }}" class="flex items-center justify-between p-3 rounded-lg bg-surface-800/50 hover:bg-surface-600/50 transition-colors group">
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center gap-2">
                                <p class="text-white text-sm font-medium truncate">{{ $message->name }}</p>
                                @if($message->status === 'new')
                                    <span class="w-2 h-2 bg-red-500 rounded-full flex-shrink-0"></span>
                                @endif
                            </div>
                            <p class="text-gray-400 text-xs mt-0.5 truncate">{{ $message->subject ?? 'No subject' }}</p>
                            <p class="text-gray-500 text-xs mt-0.5">{{ $message->created_at->diffForHumans() }}</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-600 group-hover:text-gray-400 transition-colors flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-layouts.admin>
