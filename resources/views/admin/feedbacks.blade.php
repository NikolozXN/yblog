<x-admin-layout>
    <x-feedback-layout>
        @forelse ($feedbacks as $feedback)
            <x-feedback-card :feedback="$feedback" />
        @empty
            <p class="text-red-500">No Feedback yet!</p>
        @endforelse
    </x-feedback-layout>
</x-admin-layout>
