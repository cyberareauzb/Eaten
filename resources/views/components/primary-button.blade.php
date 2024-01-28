<button {{ $attributes->merge(['type' => 'submit', 'class' => 'button preview']) }}>
    {{ $slot }}
</button>
