<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Other meta tags and CSS links -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <br>
    <h1 class="m-5 p-2 text-center text-success border border-success">Completed Tasks</h1>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Task ID </th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($completedTasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
            
            </tr>
            @endforeach
        </tbody>

        {{-- @foreach ($completedTasks as $index => $task)
        <tr class="{{ $index % 2 == 0 ? '' : 'table-secondary' }}">
            <td>{{ $task->id }}</td>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
           
        </tr>
    @endforeach --}}
    </table>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary mb-3">Back</a>
</div>  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

