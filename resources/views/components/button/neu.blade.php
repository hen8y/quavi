@props([
    'label' => 'Submit',
    'loadingText' => 'Processing...',
    'target',
    'disabled' => false,
    
    'variant' => 'primary',
    'theme' => [
        'primary' => [
            'button' => 'bg-neutral-800 text-white',
            'loading' => 'bg-neutral-800 opacity-50 text-white',
            'bg-color' => 'bg-yellow-500',
        ],
        'secondary' => [
            'button' => 'bg-gray-200 text-gray-800',
            'loading' => 'bg-gray-300 opacity-50 text-gray-800',
            'bg-color' => 'bg-gray-200',
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

    'class' => '',
    'shape' => 'rounded-full',
    'loadingStateClass' => ''
])

@php
    $themeClasses = $theme[$variant] ?? $theme['primary'];
    $sizeClasses = $sizes[$size] ?? $sizes['md'];
@endphp

<button 
    @disabled($disabled) 
    {!! $attributes->merge(['class' => "
        {$themeClasses['bg-color']}
        {$sizeClasses['width']} 
        {$shape} p-0.5 inline-block cursor-pointer
        {$class}
    "]) !!}
    wire:loading.attr="disabled" 
    wire:target="{{ $target }}"
    >

    <div 
        wire:loading 
        wire:loading.flex 
        wire:target="{{ $target }}"
        class='{{ "bg-gradient-to-r {$themeClasses['loading']} shadow-inner {$shape} size-full gap-2 {$sizeClasses['padding']} cursor-progress items-center justify-center {$loadingStateClass}" }}'
    >
        <div class="animate-spin size-4 shrink-0 border-current border-2 rounded-full border-l-transparent"></div>
        <p class="font-semibold {{ $sizeClasses['text'] }}">{{ $loadingText }}</p>
    </div>

    <div 
        wire:loading.remove 
        wire:target="{{ $target }}"
        class='{{ "bg-gradient-to-r text-center {$themeClasses['button']} shadow-inner {$shape} size-full gap-2 {$sizeClasses['padding']}" }}'
    >
        <p class="font-semibold {{ $sizeClasses['text'] }}">{{ $label }}</p>
    </div>
</button>