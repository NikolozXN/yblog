<x-layout>
    <form action="{{ route('feedback.store') }}" method="POST">
        @csrf
        <div class="mx-auto max-w-2xl">
            <div class="mb-6">
                <x-label for="body" text="Enter Your Feedback" />
                <x-textarea id="body" placeholder="This Webiste is very good for people who..." name="body"
                    rows="12" value="{{ old('body') }}" />

            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
    </form>
</x-layout>
