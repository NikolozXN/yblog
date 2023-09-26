@props(['post'])
<header class="mb-4 lg:mb-6 not-format">
    <address class="flex items-center mb-6 not-italic">
        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">

            <img class="mr-4 w-16 h-16 rounded-full" src="{{ '/storage/' . $post->author->avatar }}" alt="Jese Leos">
            <div>
                <a href="#" rel="author"
                    class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->username }}</a>
                <p class="text-base font-light text-gray-500 dark:text-gray-400">Yblog Member Since
                    {{ $post->author->created_at->format('F d, Y') }}</p>
                <p class="text-base font-light text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                        title="February 8th, 2022">Posted on {{ $post->created_at->format('F d, Y') }}</time></p>
            </div>
        </div>
    </address>
    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
        {{ $post->title }}</h1>
</header>
<figure>
    <img class="sm:max-w-xs" src="{{ '/storage/' . $post->image }}" alt="">
</figure>
<p class="text-md mb-4">{{ $post->body }}
</p>

<form action="{{ route('posts.delete', $post->slug) }}" method="POST">
    @csrf
    @method('delete')
    <button class="text-red-500">Delete</button>
</form>
