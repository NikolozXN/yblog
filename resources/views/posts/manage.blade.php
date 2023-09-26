<x-layout>
    <div class="max-w-3xl mx-auto grid p-4 gap-4 mb-24 mt-12">

        @forelse ($posts as $post)
            <x-author-posts :post="$post" />
        @empty
            <p class="text-red-500">You haven't posts yet. <a class="to-blue-500"
                    href="{{ route('posts.create') }}">Create</a></p>
        @endforelse
    </div>
</x-layout>
