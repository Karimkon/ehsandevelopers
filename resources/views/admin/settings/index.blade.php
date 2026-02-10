<x-layouts.admin>
    <x-slot:title>Site Settings</x-slot:title>
    <x-slot:header>Site Settings</x-slot:header>

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="mb-6 bg-red-600/20 border border-red-600/30 text-red-400 px-4 py-3 rounded-lg">
            <ul class="list-disc list-inside space-y-1 text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')

        @php $idx = 0; @endphp

        @foreach($settingsByGroup as $group => $settings)
            <div class="admin-card mb-6">
                <h2 class="text-lg font-semibold text-white mb-4">{{ ucfirst($group) }}</h2>

                <div class="space-y-5">
                    @foreach($settings as $setting)
                        <div>
                            <label for="setting-{{ $idx }}" class="block text-sm font-medium text-gray-300 mb-1.5">
                                {{ ucwords(str_replace('_', ' ', $setting->key)) }}
                            </label>

                            <input type="hidden" name="settings[{{ $idx }}][key]" value="{{ $setting->key }}">

                            @if($setting->type === 'textarea')
                                <textarea
                                    id="setting-{{ $idx }}"
                                    name="settings[{{ $idx }}][value]"
                                    rows="4"
                                    class="admin-input"
                                >{{ old("settings.{$idx}.value", $setting->value) }}</textarea>
                            @else
                                <input
                                    type="{{ in_array($setting->type, ['url', 'email', 'number']) ? $setting->type : 'text' }}"
                                    id="setting-{{ $idx }}"
                                    name="settings[{{ $idx }}][value]"
                                    value="{{ old("settings.{$idx}.value", $setting->value) }}"
                                    class="admin-input"
                                >
                            @endif
                        </div>

                        @php $idx++; @endphp
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="flex justify-end">
            <button type="submit" class="admin-btn gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Save Settings
            </button>
        </div>
    </form>
</x-layouts.admin>
