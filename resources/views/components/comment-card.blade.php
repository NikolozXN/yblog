@props(['comment'])
<article class="p-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
    <footer class="flex justify-between items-center mb-2">
        <div class="flex items-center">
            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                    class="mr-2 w-6 h-6 rounded-full" src="/storage/{{ $comment->author->avatar }}"
                    alt="Helene Engels">{{ $comment->author->username }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                    datetime="2022-06-23">{{ $comment->created_at->format('M. d Y') }}</time>
            </p>
        </div>
        @can('comment-author', $comment)
            <div class="flex flex-row-reverse gap-2">
                <button data-dropdown-toggle="dropdownComment"
                    class="dropdownCommentButton inline-flex items-center p-3 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    type="button">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 3">
                        <path
                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div
                    class="dropdownComment w-full hidden z-10  bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                        <li>
                            <form method="POST"
                                action="{{ route('comments.delete', [$comment->post->slug, $comment->id]) }}">
                                @csrf
                                @method('delete')
                                <button
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @endcan

    </footer>
    <p>{{ $comment->comment }}</p>
</article>
