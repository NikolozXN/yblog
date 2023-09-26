<x-layout>
    <x-success-message />
    <x-show-section-layout>
        <x-single :post="$post" />
        <x-comment-layout :post="$post">
            @forelse ($post->comments as $comment)
                <x-comment-card :comment="$comment" />
            @empty
                <p class="text-red-500">No comments on this post!</p>
            @endforelse
        </x-comment-layout>
    </x-show-section-layout>
</x-layout>
