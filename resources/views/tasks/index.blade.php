<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Other meta tags and CSS links -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body class="bg-light">
    <!-- Your content here -->
   
   
   <div>

    <div class="container text-center">
        <h1 class="m-5 p-2 text-center text-dark ">Task Management System</h1>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    
        @if(session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
         </div>
       @endif

        




        <!-- Rest of your content -->
    </div>

    <div class="container">
        <div class="m-auto ">
            <div>
                
                <a href="{{ route('tasks.create') }}" class="btn bg-white p-3 m-2 btn-lg"  >
                    <i class="fa-solid fa-circle-plus fa-lg" style="color: #000000;"></i>
                    Create Task</a>

                
                <a href="{{ route('taskshow') }}" class="btn bg-white p-3 m-2 btn-lg text-dark" >
                    <i class="fa-solid fa-eye" style="color: #00960F;"></i>
                    Show Completed Tasks</a>
            </div>
            
           
        </div>
     
<div class="bg-white p-5 table-responsive card ">
    <table class="table table-striped table-hover table-borderless">
        <thead >
            <tr>
                <th>User Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr class="rounded-6">
                <td>{{ $task->user_id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->due_date }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-outline-info btn-sm px-3">
                        <i class="fa fa-edit" style="color: #230B34;"></i> Edit
                    </a>

                    {{-- to dont appear this button for another users --}}
                    @if(Auth::user() && Auth::user()->id === $task->user_id)
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm px-3"
                            onclick="return confirm('Are you sure you want to delete this task?')">
                            <i class="fa-solid fa-trash fa-xs" style="color: #230B34;"></i> Delete
                        </button>
                    </form>
                @endif
                    {{-- <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this task?')">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form> --}}
                    
                    @if (!$task->completed)
                    <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-outline-success btn-sm px-3" >
                            <i class="fa fa-check" style="color: #230B34;"></i> Complete
                        </button>
                    </form>
                    @endif
                </td>



            </tr>
            @endforeach
        </tbody>
    </table>
</div>
       
    </div>
   </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>