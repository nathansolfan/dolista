<x-layout>

    <div class="flex flex-col items-center">
    <h1 class="text-3xl font-semibold mb-3">Create me</h1>



    <section class="shadow-md rounded-lg p-4 mb-4">
    <form action=" {{ route('tasks.store')}}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="">Title:</label>
            <input
            type="text"
            name="title"
            id="title"
            placeholder="Enter title"
            class="mt-1 py-2 px-3 border border-gray-300 rounded-md shadow-sm @error('title') border-red-500 @else border-gray-300 @enderror"
            >
            @error('title')
            <p class="text-red-500"> {{$message}} </p>

            @enderror
        </div>
        <div>
            <label for="">Description:</label>
            <input type="text" name="description" id="description" placeholder="Enter description" class="mt-1 py-2 px-3 border border-gray-300 rounded-md shadow-sm">
        </div>
        <button type="submit"
        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >Click me</button>
    </form>
</section>
</div>
</x-layout>
