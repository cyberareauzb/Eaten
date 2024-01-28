<button {{ $attributes->merge(['type' => 'button', 'class' => 'button preview']) }} style="background-color: orange">
    {{ $slot }}
</button>
