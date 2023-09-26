@props(['href'])
@props(['active'])
@props(['text'])

<li>
    <a href="{{ $href }}"
        class="block py-2 pr-4 pl-3 lg:p-0 {{ $active ? 'text-white rounded bg-blue-700 lg:bg-transparent lg:text-blue-700' : 'text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700' }}">{{ $text }}</a>
</li>
