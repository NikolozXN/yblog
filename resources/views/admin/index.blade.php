<x-admin-layout>
    <x-success-message />
    <x-admin-info :allUsers="$allUsers" :allPosts="$allPosts" :allFeedbacks="$allFeedbacks" :allComments="$allComments" />
    <x-admin-table-layout>
        @forelse ($allUsers as $user)
            <x-admin-table-row :user="$user" />
        @empty
            <p class="text-500">No Users Yet!</p>
        @endforelse
    </x-admin-table-layout>
</x-admin-layout>
