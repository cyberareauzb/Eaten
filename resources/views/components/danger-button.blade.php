<button {{ $attributes->merge(['type' => 'submit', 'class' => 'button preview']) }} style="background-color: red">
    {{ $slot }}
</button>
