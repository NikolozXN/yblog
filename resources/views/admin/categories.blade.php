<x-admin-layout>
    <x-success-message />
    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf
        <div class="flex justify-center max-w-md">
            <div class="flex flex-1 justify-between gap-2">
                <input type="text" name="name" maxLength="50" placeholder="Enter category"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <button
                    class="inset-y-0 left-0 bg-blue-500 px-6 py-1 text-white bold rounded-full hover:bg-blue-600">Add</button>
            </div>
        </div>
    </form>
    <div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-3 gap-4 lg:grid-cols-5">
        @forelse ($categories as $category)
            <x-manage-categories :category="$category" />
        @empty
            <p class="text-red-500">Please add categories now!</p>
        @endforelse
    </div>
</x-admin-layout>
