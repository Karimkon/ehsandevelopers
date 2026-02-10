<x-layouts.admin>
    <x-slot:title>Page Content</x-slot:title>
    <x-slot:header>Page Content</x-slot:header>

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

    <form action="{{ route('admin.page-content.update') }}" method="POST">
        @csrf
        @method('PUT')

        @php $idx = 0; @endphp

        @foreach($contentBySection as $section => $contents)
            <div class="admin-card mb-6">
                <h2 class="text-lg font-semibold text-white mb-4">{{ ucwords(str_replace('_', ' ', $section)) }}</h2>

                <div class="space-y-5">
                    @foreach($contents as $content)
                        <div>
                            <label for="content-{{ $idx }}" class="block text-sm font-medium text-gray-300 mb-1.5">
                                {{ $content->label }}
                            </label>

                            <input type="hidden" name="contents[{{ $idx }}][id]" value="{{ $content->id }}">

                            @if(in_array($content->type, ['textarea', 'html']))
                                <textarea
                                    id="content-{{ $idx }}"
                                    name="contents[{{ $idx }}][value]"
                                    rows="{{ $content->type === 'html' ? 8 : 4 }}"
                                    class="admin-input font-mono"
                                >{{ old("contents.{$idx}.value", $content->value) }}</textarea>
                                @if($content->type === 'html')
                                    <p class="text-xs text-gray-500 mt-1">HTML content is supported in this field.</p>
                                @endif
                            @else
                                <input
                                    type="text"
                                    id="content-{{ $idx }}"
                                    name="contents[{{ $idx }}][value]"
                                    value="{{ old("contents.{$idx}.value", $content->value) }}"
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
                Save Content
            </button>
        </div>
    </form>
</x-layouts.admin>
