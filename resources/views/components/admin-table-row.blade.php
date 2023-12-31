@props(['user'])
<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    <th scope="row"
        class="flex items-center overflow-hidden px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
        <div class=" overflow-hidden">
            <img class="w-16 h-16 object-cover rounded-full"
                src="{{ $user->avatar ? asset('/storage/' . $user->avatar) : asset('/storage/markup/profile-icon-png-898.png') }}"
                alt="">
        </div>
        <div class="pl-3 flex flex-col gap-1">
            <div class="text-base font-semibold">{{ $user->username }}</div>
            <div class="font-normal text-gray-500">{{ $user->email }}</div>
            @if ($user->deleted_at)
                <span
                    class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Blocked</span>
            @endif
        </div>
    </th>

    <td class="px-6 py-4">
        {{ $user->posts_count }}
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center">
            {{ $user->comments_count }}
        </div>
    </td>
    <td class="px-6 py-4">
        <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST">
            @csrf
            @method('delete')
            <button class="hover:text-red-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </button>
        </form>
    </td>
</tr>
