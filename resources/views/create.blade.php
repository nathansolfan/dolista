<x-layout>

    <h1 class="flex flex-col items-center">Create me</h1>
    <form action=" {{ route('tasks.store')}}" method="POST">
        @csrf
        <div>
            <label for="">Title</label>
            <input type="text" name="title" id="title">
        </div>

        <div>
            <label for="">Description</label>
            <input type="text" name="description" id="description">
        </div>
        <button type="input">Click me</button>
    </form>
</x-layout>
