@props(['color' => 'primary', 'click' => null, 'type' => 'button'])

@php
    $colors = [
        'primary' => 'bg-blue-500 hover:bg-blue-700',
        'secondary' => 'bg-gray-500 hover:bg-gray-700',
        'warning' => 'bg-yellow-500 hover:bg-yellow-700',
        'success' => 'bg-green-500 hover:bg-green-700',
        'danger' => 'bg-red-500 hover:bg-red-700',
    ];

    $colorClass = $colors[$color] ?? $colors['primary'];
@endphp

<button @if($click) wire:click="{{ $click }}" @endif type="{{ $type }}" {{ $attributes->merge(['class' => 'text-white py-1 px-3 rounded focus:outline-none focus:shadow-outline ' . $colorClass]) }}>
  {{ $slot }}
</button>