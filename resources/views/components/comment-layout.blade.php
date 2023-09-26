@props(['post'])
<section class="not-format">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion (20)
        </h2>
    </div>
    <form class="mb-6" action="{{ route('comments.store', $post->slug) }}" method="POST">
        @csrf
        <div
            class="py-2 px-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea id="comment" rows="6" name="comment"
                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                placeholder="Write a comment..." required></textarea>
        </div>
        <button type="submit"
            class="mt-3 inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
            Post comment
        </button>
    </form>
    {{ $slot }}
</section>
