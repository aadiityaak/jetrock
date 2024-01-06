@props(['id','type' => 'text', 'name', 'label', 'model', 'error'])

<div class="mb-4">
    <label for="{{ $id }}" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">{{ $label }}:</label>
    
    @if($type === 'textarea')
        <textarea wire:model="{{ $model }}" id="{{ $id }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'bg-gray-200 dark:bg-gray-900 text-gray-700 dark:text-gray-300 shadow appearance-none border dark:border-gray-700 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) }}></textarea>
    @elseif($type === 'select')
        <select wire:model="{{ $model }}" id="{{ $id }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'bg-gray-200 dark:bg-gray-900 text-gray-700 dark:text-gray-300 shadow appearance-none border dark:border-gray-700 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) }}>
            {{ $slot }}
        </select>
    @else
        <input wire:model="{{ $model }}" type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'bg-gray-200 dark:bg-gray-900 text-gray-700 dark:text-gray-300 shadow appearance-none border dark:border-gray-700 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) }}>
    @endif

    @error($model) <p class="text-red-500 text-xs italic">{{ $error }}</p> @enderror
</div>