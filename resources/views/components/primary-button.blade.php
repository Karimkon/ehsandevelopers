<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-primary text-center py-3 px-6']) }}>
    {{ $slot }}
</button>
