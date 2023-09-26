@props(['type', 'id', 'name', 'placeholder'])

<input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}"
    {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 placeholder-gray-400 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400']) }}
    placeholder="{{ $placeholder }}">
