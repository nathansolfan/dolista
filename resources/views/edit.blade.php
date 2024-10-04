<x-layout>
    <section class="flex flex-col items-center justify-content">
    <h1 class="text-4xl font-bold ">Edit</h1>
    <form action=" {{ route('tasks.update', $task->id)}}" method="POST" class="">
        @csrf
        @method('PUT')
        <div>
            <label for="" class="text-xl font-semibold">Title:</label>
            <input class="text-gray-700" type="text" name="title" id="title" value="{{ old('title', $task->title)}} ">
        </div>

        <div>
            <label for="" class="text-xl font-semibold">Description:</label>
            <input type="text" name="description" id="description" value=" {{ old('description', $task->description)}} ">
        </div>
        <button type="submit" class="text-red-600 font-bold">Click me</button>
    </form>
</section>
</x-layout>
