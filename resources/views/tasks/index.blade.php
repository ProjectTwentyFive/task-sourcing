<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
<ul>
    @foreach ($tasks as $task)
        <li>
            <a href="/tasks/{{ $task->id }}">
                {{ $task->body }}
            </a>
        </li>
    @endforeach
</ul>
</body>
</html>
