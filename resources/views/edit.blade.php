<x-layout>
    <section class="flex flex-col items-center justify-center min-h-screen bg-gray-100 py-8">
        <h1 class="text-4xl font-bold mb-6">Edit Task</h1>
        <form action="{{ route('tasks.update', $task->id)}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-lg">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-lg font-semibold mb-2">Title:</label>
                <input class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="title" id="title" value="{{ old('title', $task->title)}}" placeholder="Enter task title">
            </div>

            <div class="mb-6">
                <label for="description" class="block text-gray-700 text-lg font-semibold mb-2">Description:</label>
                <textarea class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="description" id="description" rows="4" placeholder="Enter task description">{{ old('description', $task->description)}}</textarea>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Task
                </button>
            </div>
        </form>
    </section>
</x-layout>
