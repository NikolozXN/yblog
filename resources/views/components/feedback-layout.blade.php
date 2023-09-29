<section class="bg-white dark:bg-gray-900 mb-5">
    <div class="min-w-screen min-h-screen bg-gray-50 flex items-center justify-center">
        <div class="w-full bg-white border-t border-b border-gray-200 px-5 py-16 md:py-24 text-gray-800">
            <div class="w-full max-w-6xl mx-auto">
                <div class="text-center max-w-xl mx-auto">
                    <h1 class="text-4xl font-bold mb-5 text-gray-600">What people are saying.</h1>
                    <h3 class="text-xl mb-5 font-light">Your Experience Matters!</h3>
                    <div class="text-center mb-10">
                        <span class="inline-block w-1 h-1 rounded-full bg-blue-500 ml-1"></span>
                        <span class="inline-block w-3 h-1 rounded-full bg-blue-500 ml-1"></span>
                        <span class="inline-block w-40 h-1 rounded-full bg-blue-500 ml-1"></span>
                        <span class="inline-block w-3 h-1 rounded-full bg-blue-500 ml-1"></span>
                        <span class="inline-block w-1 h-1 rounded-full bg-blue-500 ml-1"></span>
                    </div>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    {{ $slot }}
                </div>
</section>
