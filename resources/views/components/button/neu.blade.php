@props([
    'label' => 'Submit',
    'loadingText' => 'Processing...',
    'target',
    'disabled' => false,
    
    'variant' => 'primary',
    'theme' => [
        'primary' => [
            'button' => 'bg-red-700/80 text-white',
            'loading' => 'from-neutral-500 to-neutral-800',
            'default' => 'from-neutral-700 to-black',
        ],
        'secondary' => [
            'button' => 'bg-gray-200 text-gray-800',
            'loading' => 'from-gray-300 to-gray-400',
            'default' => 'from-gray-100 to-gray-200',
        ],
    ],
    
    'size' => 'md',
    'sizes' => [
        'sm' => [
            'padding' => 'p-2 md:px-4',
            'width' => 'w-auto',
            'text' => 'text-sm'
        ],
        'md' => [
            'padding' => 'p-2.5 md:px-7',
            'width' => 'w-auto',
            'text' => 'text-base'
        ],
        'full' => [
            'padding' => 'p-3 md:px-9',
            'width' => 'w-full',
            'text' => 'text-lg'
        ]
    ],

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
        {$themeClasses['button']}
        shadow-lg mt-2 block 
        {$sizeClasses['width']} 
        rounded-full p-0.5
        {$class}
    "]) !!}
    wire:loading.attr="disabled" 
    wire:target="{{ $target }}"
    >

    <div 
        wire:loading 
        wire:loading.flex 
        wire:target="{{ $target }}"
        class="border-t border-red-200/50 bg-gradient-to-r {{ $themeClasses['loading'] }} shadow-inner rounded-full size-full gap-2 {{ $sizeClasses['padding'] }} cursor-progress items-center justify-center {{ $loadingStateClass }}">
        <div class="animate-spin size-4 shrink-0 border-current border-2 rounded-full border-l-transparent"></div>
        <p class="font-semibold {{ $sizeClasses['text'] }}">{{ $loadingText }}</p>
    </div>

    <div 
        wire:loading.remove 
        wire:target="{{ $target }}"
        class="border-t border-red-200/50 bg-gradient-to-r text-center {{ !$disabled ?: 'opacity-60 cursor-not-allowed' }} {{ $themeClasses['default'] }} shadow-inner rounded-full size-full gap-2 {{ $sizeClasses['padding'] }}">
        <p class="font-semibold {{ $sizeClasses['text'] }}">{{ $label }}</p>
    </div>
</button>