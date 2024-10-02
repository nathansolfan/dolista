<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello</h1>
    <a href="/create">Create me</a>
    <a href=" {{route('tasks.create')}} ">Route me</a>



    @if ($tasks->isEmpty())
    <p>No tasks</p>
    @else


    @foreach ( $tasks as $task )
    <p> {{ $task->title }} </p>
    <p> {{ $task->description}} </p>
    <a href=" {{route('tasks.edit')}} ">Edit me</a>

    @endforeach
    @endif

</body>
</html>
