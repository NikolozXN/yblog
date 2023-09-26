@props(['allUsers'])
@props(['allPosts'])
@props(['allFeedbacks'])
@props(['allComments'])

<div class="p-4 rounded-lg dark:border-gray-700">
    <div class="grid gap-4 mb-4 lg:grid-cols-4">
        <div>
            <div class="flex items-center px-4 py-6 bg-white rounded-md
                        shadow-md">
                <div class="p-3 bg-indigo-600 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="mx-4">
                    <h4 class="text-2xl font-semibold text-gray-700">{{ count($allUsers) }}</h4>
                    <div class="text-gray-500">All Users</div>
                </div>
            </div>
        </div>
        <div>
            <div class="flex items-center px-4 py-6 bg-white rounded-md
                        shadow-md">
                <div class="p-3 bg-indigo-600 rounded text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>
                </div>
                <div class="mx-4">
                    <h4 class="text-2xl font-semibold text-gray-700">{{ count($allPosts) }}</h4>
                    <div class="text-gray-500">All Posts</div>
                </div>
            </div>
        </div>
        <div>
            <div class="flex items-center px-4 py-6 bg-white rounded-md
                        shadow-md">
                <div class="p-3 bg-indigo-600 rounded text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg>
                </div>
                <div class="mx-4">
                    <h4 class="text-2xl font-semibold text-gray-700">{{ count($allFeedbacks) }}</h4>
                    <div class="text-gray-500">All Feedbacks</div>
                </div>

            </div>
        </div>

        <div>
            <div class="flex items-center px-4 py-6 bg-white rounded-md
                        shadow-md">
                <div class="p-3 bg-indigo-600 rounded text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                </div>
                <div class="mx-4">
                    <h4 class="text-2xl font-semibold text-gray-700">{{ count($allComments) }}</h4>
                    <div class="text-gray-500">All Comments</div>
                </div>

            </div>
        </div>

    </div>
