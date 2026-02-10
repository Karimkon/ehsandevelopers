<x-layouts.admin>
    <x-slot:title>Service Request {{ $serviceRequest->reference_number }}</x-slot:title>
    <x-slot:header>Service Request Details</x-slot:header>

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.service-requests.index') }}" class="text-gray-400 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <h2 class="text-white font-display font-semibold text-lg">{{ $serviceRequest->reference_number }}</h2>
                <p class="text-gray-500 text-sm">Submitted {{ $serviceRequest->created_at->format('M d, Y \a\t h:i A') }}</p>
            </div>
        </div>
    </div>

    <!-- Two Column Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Left Column (2/3) -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Client Info Card -->
            <div class="admin-card">
                <h3 class="text-white font-semibold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Client Information
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Name</p>
                        <p class="text-gray-200">{{ $serviceRequest->name }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Email</p>
                        <p class="text-gray-200">
                            <a href="mailto:{{ $serviceRequest->email }}" class="text-primary-400 hover:text-primary-300 transition-colors">{{ $serviceRequest->email }}</a>
                        </p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Phone</p>
                        <p class="text-gray-200">{{ $serviceRequest->phone ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Company</p>
                        <p class="text-gray-200">{{ $serviceRequest->company ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- Project Details Card -->
            <div class="admin-card">
                <h3 class="text-white font-semibold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Project Details
                </h3>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Service</p>
                            <p class="text-gray-200">{{ $serviceRequest->service->name ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Budget Range</p>
                            <p class="text-gray-200">{{ $serviceRequest->budget_range ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Timeline</p>
                            <p class="text-gray-200">{{ $serviceRequest->timeline ?? '-' }}</p>
                        </div>
                    </div>

                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Project Description</p>
                        <div class="bg-surface-800 rounded-lg p-4 mt-1">
                            <p class="text-gray-300 text-sm leading-relaxed whitespace-pre-wrap">{{ $serviceRequest->project_description ?? 'No description provided.' }}</p>
                        </div>
                    </div>

                    <!-- Attachments -->
                    @if($serviceRequest->attachments && count($serviceRequest->attachments) > 0)
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider mb-2">Attachments</p>
                            <div class="space-y-2">
                                @foreach($serviceRequest->attachments as $attachment)
                                    <a href="{{ Storage::url($attachment) }}" target="_blank" class="flex items-center gap-3 p-3 bg-surface-800 rounded-lg hover:bg-surface-600/50 transition-colors group">
                                        <svg class="w-5 h-5 text-gray-500 group-hover:text-primary-400 transition-colors flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                                        <span class="text-sm text-gray-300 group-hover:text-white transition-colors truncate">{{ basename($attachment) }}</span>
                                        <svg class="w-4 h-4 text-gray-600 group-hover:text-gray-400 transition-colors flex-shrink-0 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Attachments</p>
                            <p class="text-gray-500 text-sm">No attachments.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Column (1/3) -->
        <div class="space-y-6">

            <!-- Status Update Form -->
            <div class="admin-card">
                <h3 class="text-white font-semibold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Update Request
                </h3>
                <form method="POST" action="{{ route('admin.service-requests.update', $serviceRequest) }}">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-xs text-gray-400 mb-1.5">Status</label>
                            <select name="status" id="status" class="admin-select text-sm">
                                @foreach(['new', 'reviewing', 'quoted', 'in_progress', 'completed', 'cancelled'] as $status)
                                    <option value="{{ $status }}" {{ old('status', $serviceRequest->status) === $status ? 'selected' : '' }}>{{ ucfirst(str_replace('_', ' ', $status)) }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Priority -->
                        <div>
                            <label for="priority" class="block text-xs text-gray-400 mb-1.5">Priority</label>
                            <select name="priority" id="priority" class="admin-select text-sm">
                                @foreach(['low', 'medium', 'high', 'urgent'] as $priority)
                                    <option value="{{ $priority }}" {{ old('priority', $serviceRequest->priority) === $priority ? 'selected' : '' }}>{{ ucfirst($priority) }}</option>
                                @endforeach
                            </select>
                            @error('priority')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Quoted Amount -->
                        <div>
                            <label for="quoted_amount" class="block text-xs text-gray-400 mb-1.5">Quoted Amount</label>
                            <input type="number" name="quoted_amount" id="quoted_amount" step="0.01" min="0" value="{{ old('quoted_amount', $serviceRequest->quoted_amount) }}" placeholder="0.00" class="admin-input text-sm">
                            @error('quoted_amount')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Admin Notes -->
                        <div>
                            <label for="admin_notes" class="block text-xs text-gray-400 mb-1.5">Admin Notes</label>
                            <textarea name="admin_notes" id="admin_notes" rows="4" placeholder="Internal notes about this request..." class="admin-input text-sm resize-y">{{ old('admin_notes', $serviceRequest->admin_notes) }}</textarea>
                            @error('admin_notes')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Save Button -->
                        <button type="submit" class="admin-btn w-full gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>

            <!-- Timeline / Meta Info Card -->
            <div class="admin-card">
                <h3 class="text-white font-semibold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Timeline
                </h3>
                @php
                    $statusColors = [
                        'new' => 'bg-blue-500/20 text-blue-400',
                        'reviewing' => 'bg-yellow-500/20 text-yellow-400',
                        'quoted' => 'bg-purple-500/20 text-purple-400',
                        'in_progress' => 'bg-green-500/20 text-green-400',
                        'completed' => 'bg-emerald-500/20 text-emerald-400',
                        'cancelled' => 'bg-red-500/20 text-red-400',
                    ];
                    $priorityColors = [
                        'low' => 'bg-gray-500/20 text-gray-400',
                        'medium' => 'bg-yellow-500/20 text-yellow-400',
                        'high' => 'bg-orange-500/20 text-orange-400',
                        'urgent' => 'bg-red-500/20 text-red-400',
                    ];
                @endphp
                <div class="space-y-4">
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Current Status</p>
                        <span class="text-xs px-2.5 py-1 rounded-full font-medium {{ $statusColors[$serviceRequest->status] ?? 'bg-gray-500/20 text-gray-400' }}">
                            {{ ucfirst(str_replace('_', ' ', $serviceRequest->status)) }}
                        </span>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Current Priority</p>
                        <span class="text-xs px-2.5 py-1 rounded-full font-medium {{ $priorityColors[$serviceRequest->priority] ?? 'bg-gray-500/20 text-gray-400' }}">
                            {{ ucfirst($serviceRequest->priority) }}
                        </span>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Created At</p>
                        <p class="text-gray-300 text-sm">{{ $serviceRequest->created_at->format('M d, Y \a\t h:i A') }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Last Updated</p>
                        <p class="text-gray-300 text-sm">{{ $serviceRequest->updated_at->format('M d, Y \a\t h:i A') }}</p>
                    </div>
                    @if($serviceRequest->quoted_amount)
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Quoted Amount</p>
                            <p class="text-white font-semibold">${{ number_format($serviceRequest->quoted_amount, 2) }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Section -->
    <div class="mt-8 pt-6 border-t border-surface-600" x-data="{ confirmDelete: false }">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-red-400 font-semibold">Danger Zone</h3>
                <p class="text-gray-500 text-sm mt-1">Permanently delete this service request. This action cannot be undone.</p>
            </div>
            <button @click="confirmDelete = true" class="admin-btn-danger gap-2" x-show="!confirmDelete">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                Delete Request
            </button>
            <div x-show="confirmDelete" x-transition class="flex items-center gap-3">
                <span class="text-red-400 text-sm">Are you sure?</span>
                <form method="POST" action="{{ route('admin.service-requests.destroy', $serviceRequest) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="admin-btn-danger gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Yes, Delete
                    </button>
                </form>
                <button @click="confirmDelete = false" class="admin-btn-secondary">Cancel</button>
            </div>
        </div>
    </div>
</x-layouts.admin>
