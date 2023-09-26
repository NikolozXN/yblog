@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="max-w-3xl mt-4 mx-auto p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <div>
            <span class="font-medium">{{ session('message') }}</span>
        </div>
    </div>
@endif
