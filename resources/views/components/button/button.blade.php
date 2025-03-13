@props([
    'label' => 'Submit',
    'loadingText' => 'Processing...',
    'target' => null,
    'disabled' => false,
    
    'variant' => 'primary',
    'theme' => [
        'primary' => [
            'button' => 'bg-neutral-800 shadow-lg backdrop-blur-md shadow-neutral-600/30 text-white',
            'loading' => 'bg-neutral-800 opacity-50 text-white',
        ],
        'secondary' => [
            'button' => 'bg-gray-200 text-gray-800',
            'loading' => 'bg-gray-300 opacity-50 text-gray-800',
        ],
    ],
    
    'size' => 'md',
    'sizes' => [
        'sm' => [
            'padding' => 'p-2 px-4',
            'width' => 'w-auto',
            'text' => 'text-xs'
        ],
        'md' => [
            'padding' => 'p-2.5 px-5',
            'width' => 'w-auto',
            'text' => 'text-sm'
        ],
        'full' => [
            'padding' => 'p-3 px-5',
            'width' => 'w-full',
            'text' => 'text-base'
        ]
    ],
    'shape' => 'rounded-full',
    'class' => '',
    'loadingStateClass' => ''
])

@php
    $themeClasses = $theme[$variant] ?? $theme['primary'];
    $sizeClasses = $sizes[$size] ?? $sizes['md'];
@endphp

<button 
    @disabled($disabled) 
    {!! $attributes->merge(['class' => "
        {$sizeClasses['width']} 
        {$shape} p-0.5
        {$class} inline-block cursor-pointer
    "]) !!}
    wire:loading.attr="disabled" 
    @if ($target) 
        wire:target="{{ $target }}"
    @endif
    >

    <div 
        wire:loading 
        wire:loading.flex 
        wire:target="{{ $target }}"
        class='{{ "{$themeClasses['loading']} {$shape} size-full gap-2 {$sizeClasses['padding']} cursor-progress items-center justify-center {$loadingStateClass}" }}'
    >
        <div class="animate-spin size-4 shrink-0 border-current border-2 rounded-full border-l-transparent"></div>
        <p class="font-semibold {{ $sizeClasses['text'] }}">{{ $loadingText }}</p>
    </div>

    <div 
        wire:loading.remove 
        wire:target="{{ $target }}"
        class="text-center {{ !$disabled ?: 'opacity-60 cursor-not-allowed' }} {{ $themeClasses['button'] }} {{ $shape }} size-full gap-2 {{ $sizeClasses['padding'] }}">
        <p class="font-semibold {{ $sizeClasses['text'] }}">{{ $label }}</p>
    </div>
</button>
