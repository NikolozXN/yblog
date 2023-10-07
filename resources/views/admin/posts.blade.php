<x-admin-layout>
    <x-grid-layout>
        @forelse ($posts as $post)
            <x-single-card :post="$post" />
        @empty
            <p class="text-red-500">No Posts Yet!</p>
        @endforelse
    </x-grid-layout>
</x-admin-layout>
