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
            'loading' => 'bg-gray-200 opacity-50 text-gray-800',
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
            'padding' => 'p-2.5 px-5',
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
    wire:loading.attr="disabled" 
    @if ($target) 
        wire:target="{{ $target }}"
    @endif
    class='{{ "{$shape} {$sizeClasses['width']} {$sizeClasses['text']} font-semibold inline-block  p-0.5 cursor-pointer" }}'
>
    <div
        wire:loading
        wire:loading.flex
        wire:target="{{ $target }}"
        class='{{ "{$themeClasses['loading']} flex items-center overflow-hidden justify-center gap-2 {$sizeClasses['padding']} {$shape} w-full cursor-progress {$loadingStateClass}" }}'
    >
        <span>{{ $label }}</span>
        <div class="animate-spin size-4 shrink-0 border-current border-2 rounded-full border-l-transparent"></div>
    </div>
    
    <div
        x-data="{ showCheck: false }"
        x-init="
            $wire.on('{{ $target }}', () => {
                showCheck = true;
                setTimeout(() => showCheck = false, 3000);
            });
        "
        wire:loading.remove
        wire:target="{{ $target }}"
        {!! $attributes->merge(['class' => "{$themeClasses['button']} {$sizeClasses['padding']} flex items-center justify-center gap-2 {$shape} w-full {$class}"]) !!}
    >
        <span>{{ $label }}</span>
        <svg
            x-show="showCheck"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            xmlns="http://www.w3.org/2000/svg"
            class="text-green-500 h-5 w-5 shrink-0"
            viewBox="0 0 48 48"
            style="display: none;"
        >
            <defs>
                <mask id="checkMask">
                    <g fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="4">
                        <path fill="#555555" d="M24 44a19.94 19.94 0 0 0 14.142-5.858A19.94 19.94 0 0 0 44 24a19.94 19.94 0 0 0-5.858-14.142A19.94 19.94 0 0 0 24 4A19.94 19.94 0 0 0 9.858 9.858A19.94 19.94 0 0 0 4 24a19.94 19.94 0 0 0 5.858 14.142A19.94 19.94 0 0 0 24 44Z"/>
                        <path stroke-linecap="round" d="m16 24l6 6l12-12"/>
                    </g>
                </mask>
            </defs>
            <path fill="currentColor" d="M0 0h48v48H0z" mask="url(#checkMask)"/>
        </svg>
    </div>
</button>