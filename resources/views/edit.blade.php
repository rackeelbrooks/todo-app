<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Todo Application - Edit Page</title>
    <link rel="stylesheet" href="/css/todo.css">
</head>
<body>

    <x-navbar></x-navbar>

    <form action="{{route('updateTask', $listItem->id)}}" method="POST">
        @method('PUT')
        {{ csrf_field() }}

        <div style="margin-bottom:20px">
            <label for="" style="color:#F05340;">Place an Assignment</label>
            <button style="margin: 0px 20px;">Update Task</button>
        </div>

        <div>
            <input type="text" class="text-field" name="name" value="{{$listItem->name}}">
            <input type="text class="text-field" name="created_at" value="{{$listItem->created_at}}>
        </div>
    </form>

</body>
</html>
