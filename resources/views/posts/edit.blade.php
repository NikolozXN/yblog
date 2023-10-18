<x-layout>
    <form method="POST" action="{{ route('posts.update', $post->slug) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mx-auto max-w-4xl p-6 ">
            <div class="mb-6">
                <x-label for="title" text="Enter your post's title" />
                <x-input id="title" type="text" placeholder="How to find remote job.." name="title"
                    :value="$post->title" />
                @error('title')
                    <small class="text-xs text-red-500">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-6">
                <x-label for="body" text="Enter your post" />
                <x-textarea id="body" :value="$post->body" name="body"
                    placeholder="Seeking for remote job is dufficult..." rows="10" />
                @error('body')
                    <small class="text-xs text-red-500">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-6">
                <x-label for="categories" text="Select a Category" />
                <select id="categories" name="category_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @empty
                    @endforelse
                </select>
                @error('category_id')
                    <small class="text-xs text-red-500">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-6">
                <x-label for="file" text="Upload image" />
                <div>
                    <x-input type="file" name="image" id="file" placeholder=""
                        class="block mb-4 w-full text-sm text-gray-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0
                            file:text-sm file:font-semibold
                            file:bg-blue-500 file:text-white
                            hover:file:bg-blue-600
                          "
                        onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" />
                    <div class="w-14 mb-3">
                        <img id="output"
                            src="{{ $post->image ? asset('/storage/' . $post->image) : asset('/storage/markup/Mediamodifier-Design-Template.png') }}">
                    </div>
                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</x-layout>
