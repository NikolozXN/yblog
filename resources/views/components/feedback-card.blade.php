@props(['feedback'])
<!-- component -->
<div class="w-full mx-auto rounded-lg bg-white border border-gray-200 p-5 text-gray-800 font-light ">
    <div class="w-full flex mb-4 items-center">
        <div class="overflow-hidden">
            <img class="rounded-full w-12 h-12 object-cover"
                src="{{ $feedback->author->avatar ? asset('/storage/' . $feedback->author->avatar) : asset('storage/markup/profile-icon-png-898.png') }}"
                alt="">
        </div>
        <div class="flex-grow pl-3">
            <h6 class="font-bold text-sm uppercase text-gray-600">{{ $feedback->author->username }}</h6>
        </div>
        @can('admin')
            <form action="{{ route('feedback.delete', $feedback->id) }}" method="Post">
                @csrf
                @method('delete')
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 mr-2 rounded-full">
                    Delete
                </button>
            </form>
        @endcan
        <div>
            {{ $feedback->created_at->format('m D, Y') }}
        </div>
    </div>
    <div class="w-full">
        <p class="text-lg leading-tight"><span
                class="text-lg leading-none italic font-bold text-gray-400 mr-1">"</span>{{ $feedback->body }}<span
                class="text-lg leading-none italic font-bold text-gray-400 ml-1">"</span></p>
    </div>

</div>
