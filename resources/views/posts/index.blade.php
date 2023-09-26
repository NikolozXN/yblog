<x-layout>
    <x-success-message />
    <x-hero-section />
    <x-grid-layout>
        @forelse ($posts as $post)
            <x-single-card :post="$post" />
        @empty
            <p class="text-red-500">No Posts Found!</p>
        @endforelse

    </x-grid-layout>
    <div class="">
        {{ $posts->links() }}
    </div>
    <x-feedback-layout>
        @forelse ($feedbacks as $feedback)
            <x-feedback-card :feedback="$feedback" />
        @empty
            <p class="text-red-500">No Feedback! <a href="{{ route('feedback.create') }}">Create One</a></p>
        @endforelse
    </x-feedback-layout>
</x-layout>
