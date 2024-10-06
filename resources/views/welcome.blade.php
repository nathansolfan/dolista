<x-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-4">
        <h1 class="text-4xl font-bold underline mb-6">Todo App</h1>
        <div class="mb-4">
            <a href="{{ route('tasks.create') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Create Task</a>
        </div>

        {{-- Success message --}}
        @if (session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 border border-green-400 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error message for red (task status not updated) --}}
        @if (session('error'))
            <div class="mb-4 px-4 py-2 bg-red-100 text-red-700 border border-red-400 rounded">
                {{ session('error') }}
            </div>
        @endif


        @if ($tasks->isEmpty())
            <p class="text-gray-500">No tasks available. Start by creating one!</p>
        @else
            <div class="w-full max-w-md">
                @foreach ($tasks as $task)
                    <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                        <h2 class="text-xl font-semibold {{ $task->completed ? 'line-through text-green-500' : 'text-blue-500' }}">
                            {{ $task->title }}
                        </h2>
                        <p class="text-gray-700 mb-2">{{ $task->description }}</p>
                        <div class="flex space-x-4">

                            {{-- Toggle Completion --}}
                            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="completed" value="1">
                                <button type="submit" class="text-green-600 hover:underline">
                                    {{ $task->completed ? 'Incomplete' : 'Complete' }}
                                </button>
                            </form>

                            {{-- Edit Task --}}
                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-indigo-600 hover:underline">Edit</a>

                            {{-- Show Task --}}
                            <a href="{{ route('tasks.show', $task->id) }}" class="text-green-600 hover:underline">Show</a>

                            {{-- Delete Task --}}
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                            {{-- PRIORITY --}}
                            <form action=" {{route('tasks.update', $task->id)}} " method="POST">
                                @csrf
                                @method('PUT')

                                {{-- ACTUAL DROPDOWN --}}
                                <label for="priority">Priority:</label>
                                <select name="priority" id="priority" onchange="this.form.submit()" class="border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="1" {{ old('priority') == 1 ? 'selected' : '' }} >Low</option>
                                    <option value="2">Medium</option>
                                    <option value="3">High</option>
                                </select>

                        </form>

                        </div>
                    </div>
                @endforeach
                {{-- PAGINATE --}}
                <div class="">
                    {{ $tasks->links() }}
                </div>
            </div>
        @endif
    </div>
</x-layout>


{{-- @if ($task->priority === 1)
<span>Priority: Low</span>
@elseif ($task->priority === 2)
<span>Priority: Medium</span>
@elseif ($task->priority === 3)
<span>Priority: High</span>
@endif --}}
