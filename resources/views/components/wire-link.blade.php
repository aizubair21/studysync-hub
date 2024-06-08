@props(['class', 'style'])
<a :style="$style" {{ $attributes->merge(['type' => 'button', 'class' => '']) }} href="" wire:navigate>
    {{ $slot }}
</a>
