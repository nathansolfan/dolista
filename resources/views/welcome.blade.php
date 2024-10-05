<x-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-4">
        <h1 class="text-4xl font-bold underline mb-6">
            Todo App
        </h1>
        <div class="mb-4">
            <a href="{{ route('tasks.create') }}" class="text-blue-500 hover:text-blue-700 font-semibold">
                Create Task
            </a>
        </div>

        {{-- success msg --}}
    @if (session('success'))
    <div class="mb-4 px-4 py-2 bg-green-100 textn-green-700 border border-green-400 rounded">
        {{ session('success')}}
    </div>
    @endif

        @if ($tasks->isEmpty())
            <p class="text-gray-500">No tasks available. Start by creating one!</p>
        @else
            <div class="w-full max-w-md">
                @foreach ($tasks as $task)
                    <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                        <h2 class="text-xl font-semibold text-blue-500">{{ $task->title }}</h2>
                        <p class="text-gray-700 mb-2">{{ $task->description }}</p>
                        <div class="flex space-x-4">

                            {{-- TOGGLE COMPLETED STATUS --}}
                            <form action=" {{route('tasks.update', $task->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="completed" value="1">
                                <button type="submit" class="text-green-600 hover:underline">
                                    {{ $task->completed ? 'Mark as Incomplete' : 'Mark as Done'}}
                                </button>
                            </form>

                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-indigo-600 hover:underline">
                                Edit
                            </a>
                            <a href=" {{ route('tasks.show', $task->id)}}" class="text-green-600 hover:underline">Show</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">
                                    Delete
                                </button>
                            </form>


                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
