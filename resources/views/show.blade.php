<x-layout>
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $task->title }}</h1>
            <p class="text-lg text-gray-600">{{ $task->description }}</p>
        </div>
        <div class="mt-6">
            <a href="{{ route('tasks.index') }}" class="text-blue-500 hover:underline">
                Back to Task List
            </a>
        </div>
    </div>
</x-layout>
