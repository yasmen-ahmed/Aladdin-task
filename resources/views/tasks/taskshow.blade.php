<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Other meta tags and CSS links -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
<div class="container">
    <br>
    <h1 class="m-3 p-2 text-center">Completed Tasks</h1>
    <div class="bg-white p-4 m-2 table-responsive card">
        <table class="thead-dark table table-striped table-hover table-borderless">
            <thead >
                <tr>
                    <th>Task ID </th>
                    <th >Title</th>
                    <th >Description</th>
    
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
        </table>
    </div>
    
    <div>
        <a href="{{ route('tasks.index') }}" class="btn btn-outline-dark p-2 m-2 btn-lg" >
            <i class="fa-solid fa-left-long fa-lg" style="color: #161717;"></i>
            Back</a>
    </div>
  
</div>  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

