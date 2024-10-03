<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit</h1>
    <form action=" {{ route('tasks.update', $task->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $task->title)}} ">
        </div>

        <div>
            <label for="">Description</label>
            <input type="text" name="description" id="description" value=" {{ old('description', $task->description)}} ">
        </div>
        <button type="submit">Click me</button>
    </form>

</body>
</html>
