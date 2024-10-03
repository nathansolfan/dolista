    <x-layout>

    <h1 class="text-3xl font-bold underline">
        Hello world!
      </h1>
    <a href="/create">Create me</a>
    <a href=" {{route('tasks.create')}} ">Route me</a>

    @if ($tasks->isEmpty())
    <p>No tasks</p>
    @else


    @foreach ( $tasks as $task )
    <p> {{ $task->title }} </p>
    <p> {{ $task->description}} </p>
    <a href=" {{route('tasks.edit', $task->id)}}" class="underline">Edit me</a>
    <form action=" {{route('tasks.destroy', $task->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    @endforeach
    @endif
</x-layout>

